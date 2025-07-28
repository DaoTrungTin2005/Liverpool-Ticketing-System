<?php
function construct() {
    load_model('checkout');
}

function checkout_addtocartAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = $_POST['fullname'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';

        $total_price = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $price = (int)str_replace(',', '', $item['price']);
                $qty = $item['qty'] ?? 1;
                $total_price += $price * $qty;
            }

            // Lưu tạm vào SESSION
            $_SESSION['checkout_info'] = [
                'fullname' => $fullname,
                'phone' => $phone,
                'email' => $email,
                'total_price' => $total_price,
                'account_id' => $_SESSION['account']['id'] ?? null,
                'cart' => $_SESSION['cart']
            ];

            // Chuyển sang file thanh toán
            redirect("modules/checkout/vnpay_create_payment.php");
            exit;
        } else {
            $_SESSION['error'] = "Giỏ hàng đang trống!";
        }
    }

    load_view('checkout_addtocart');
}

function checkout_buyingnowAction() {
    if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
        // Chuyển hướng đến trang đăng nhập
        redirect("?mod=auth&controller=auth&action=sign_in");
        return; // Dừng luôn
    }

    if (!isset($_GET['id'])) {
        $_SESSION['error'] = "Không tìm thấy vé để mua.";
        redirect("?mod=home&controller=home&action=home");
        return;
    }

    $ticket_id = $_GET['id'];
    $ticket = get_ticket_by_id($ticket_id);

    if (!$ticket) {
        $_SESSION['error'] = "Vé không tồn tại.";
        redirect("?mod=home&controller=home&action=home");
        return;
    }

    // Lấy các loại vé cho cùng trận đấu
    $ticket_types = get_prices_by_match_and_datetime($ticket['match_name'], $ticket['match_datetime']);

    // Gửi sang view
    $data = [
        'ticket' => $ticket,
        'ticket_types' => $ticket_types
    ];

    load_view('checkout_buyingnow', $data);
}

function checkout_buynow_redirectAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = $_POST['fullname'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $ticket_id = $_POST['ticket_id'] ?? null;
        $ticket_type_id = $_POST['ticket_type_id'] ?? null;
        $total_price = $_POST['total_price'] ?? 0;
        $account_id = $_SESSION['account']['id'] ?? null;

        // Lấy thêm thông tin vé
        $ticket = get_ticket_by_id($ticket_id);
        $ticket_type = get_ticket_type_by_id($ticket_type_id);

        if (!$ticket || !$ticket_type) {
            $_SESSION['error'] = "Dữ liệu vé không hợp lệ.";
            redirect("?mod=checkout&controller=checkout&action=checkout_buyingnow&id=$ticket_id");
            return;
        }

        // Lưu thông tin vào SESSION
        $_SESSION['checkout_info'] = [
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'total_price' => $total_price,
            'account_id' => $account_id,
            'cart' => [
                [
                    'id' => $ticket_id, // Sẽ được cập nhật trong update_buynow_sessionAction
                    'match_name' => $ticket['match_name'],
                    'match_datetime' => $ticket['match_datetime'],
                    'ticket_type_name' => $ticket_type['name'],
                    'price' => $total_price,
                    'qty' => 1
                ]
            ]
        ];

        // Gửi đến VNPAY
        redirect("modules/checkout/vnpay_create_payment.php");
        exit;
    }

    $_SESSION['error'] = "Phương thức không hợp lệ.";
    redirect("?mod=home&controller=home&action=home");
}

function update_buynow_sessionAction() {
    header('Content-Type: application/json');

    $ticket_id = isset($_POST['ticket_id']) ? (int)$_POST['ticket_id'] : 0;
    $ticket_type_id = isset($_POST['ticket_type_id']) ? (int)$_POST['ticket_type_id'] : 0;
    $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;

    if ($ticket_id > 0 && $ticket_type_id > 0) {
        // Lấy thông tin vé ban đầu
        $ticket = get_ticket_by_id($ticket_id);
        if ($ticket) {
            // Tìm ticket_id mới dựa trên ticket_type_id
            $new_ticket_id = get_ticket_id_by_match_datetime_and_type($ticket['match_name'], $ticket['match_datetime'], $ticket_type_id);
            if ($new_ticket_id) {
                $ticket_type = get_ticket_type_by_id($ticket_type_id);
                // Debug: Kiểm tra new_ticket_id
                error_log("New ticket_id: $new_ticket_id for match: {$ticket['match_name']}, type: $ticket_type_id");
                // Cập nhật session checkout_info
                if (isset($_SESSION['checkout_info']['cart']) && !empty($_SESSION['checkout_info']['cart'])) {
                    $_SESSION['checkout_info']['cart'][0]['id'] = $new_ticket_id;
                    $_SESSION['checkout_info']['cart'][0]['price'] = $price;
                    $_SESSION['checkout_info']['cart'][0]['ticket_type_name'] = $ticket_type['name'];
                    $_SESSION['checkout_info']['total_price'] = $price;
                } else {
                    $_SESSION['checkout_info'] = [
                        'cart' => [
                            [
                                'id' => $new_ticket_id,
                                'match_name' => $ticket['match_name'],
                                'match_datetime' => $ticket['match_datetime'],
                                'ticket_type_name' => $ticket_type['name'],
                                'price' => $price,
                                'qty' => 1
                            ]
                        ],
                        'total_price' => $price
                    ];
                }
                echo json_encode(['success' => true, 'new_ticket_id' => $new_ticket_id]);
            } else {
                // Debug: Nếu không tìm thấy ticket_id mới
                error_log("Không tìm thấy ticket_id mới. Match: {$ticket['match_name']}, Type: $ticket_type_id");
                echo json_encode(['success' => false, 'message' => 'Không tìm thấy ticket_id mới. Match: ' . $ticket['match_name'] . ', Type: ' . $ticket_type_id]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy vé']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
    }
}
?>