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
                $price = (int) str_replace(',', '', $item['price']);
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
        echo "Không tìm thấy vé để mua.";
        return;
    }

    $ticket_id = $_GET['id'];
    $ticket = get_ticket_by_id($ticket_id);

    if (!$ticket) {
        echo "Vé không tồn tại.";
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
            echo "Dữ liệu vé không hợp lệ.";
            return;
        }

        // Lưu thông tin vào SESSION như giỏ hàng
        $_SESSION['checkout_info'] = [
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'total_price' => $total_price,
            'account_id' => $account_id,
            'cart' => [
                [
                    'id' => $ticket_id,
                    'match_name' => $ticket['match_name'],
                    'match_datetime' => $ticket['match_datetime'],
                    'ticket_type_name' => $ticket_type['ticket_type_name'],
                    'price' => $ticket_type['price'],
                    'qty' => 1
                ]
            ]
        ];

        // Gửi đến VNPAY
        redirect("modules/checkout/vnpay_create_payment.php");
        exit;
    }

    echo "Phương thức không hợp lệ.";
}


    ?>