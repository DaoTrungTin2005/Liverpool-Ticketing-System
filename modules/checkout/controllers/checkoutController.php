<?php
function construct()
{
    load_model('checkout');
}

function checkout_addtocartAction()
{
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

            // lưu  vào ss , truyền qua vn pay mốt xaid
            $_SESSION['checkout_info'] = [
                'fullname' => $fullname,
                'phone' => $phone,
                'email' => $email,
                'total_price' => $total_price,
                'account_id' => $_SESSION['account']['id'] ?? null,
                'cart' => $_SESSION['cart']
            ];


            redirect("modules/checkout/vnpay_create_payment.php");
            exit;
        } else {
            $_SESSION['error'] = "Giỏ hàng đang trống!";
        }
    }

    load_view('checkout_addtocart');
}




function checkout_buyingnowAction()
{
    if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {

        redirect("?mod=auth&controller=auth&action=sign_in");
        return;
    }

    if (!isset($_GET['id'])) {
        $_SESSION['error'] = "Không tìm thấy vé để mua.";
        redirect("?mod=home&controller=home&action=home");
        return;
    }

    // lay tt vé theo id
    $ticket_id = $_GET['id'];
    $ticket = get_ticket_by_id($ticket_id);

    if (!$ticket) {
        $_SESSION['error'] = "Vé không tồn tại.";
        redirect("?mod=home&controller=home&action=home");
        return;
    }


    $ticket_types = get_prices_by_match_and_datetime($ticket['match_name'], $ticket['match_datetime']);

    //gui dl sang view
    $data = [
        'ticket' => $ticket,
        'ticket_types' => $ticket_types
    ];

    load_view('checkout_buyingnow', $data);
}



// make a
function checkout_buynow_redirectAction()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = $_POST['fullname'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $account_id = $_SESSION['account']['id'] ?? null;



        // Lấy từ SESSION đã được update ở update_buynow_session
        $cart_item = $_SESSION['checkout_info']['cart'][0] ?? null;

        if (!$cart_item) {
            $_SESSION['error'] = "Không có dữ liệu giỏ hàng.";
            redirect("?mod=home&controller=home&action=home");
            return;
        }



        // Lưu thông tin doo SESSION
        $_SESSION['checkout_info'] = [
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'total_price' => $cart_item['price'],
            'account_id' => $account_id,
            'cart' => [$cart_item]
        ];


        redirect("modules/checkout/vnpay_create_payment.php");
        exit;
    }

    $_SESSION['error'] = "Phương thức không hợp lệ.";
    redirect("?mod=home&controller=home&action=home");
}


function update_buynow_sessionAction()
{
    header('Content-Type: application/json');

    $ticket_id = isset($_POST['ticket_id']) ? (int)$_POST['ticket_id'] : 0;
    $ticket_type_id = isset($_POST['ticket_type_id']) ? (int)$_POST['ticket_type_id'] : 0;
    $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;

    if ($ticket_id > 0 && $ticket_type_id > 0) {

        // lấy tt vé
        $ticket = get_ticket_by_id($ticket_id);
        if ($ticket) {


            // kím đúng id vé
            $new_ticket_id = get_ticket_id_by_match_datetime_and_type($ticket['match_name'], $ticket['match_datetime'], $ticket_type_id);
            if ($new_ticket_id) {

          
                $ticket_type = get_ticket_type_by_id($ticket_type_id);





                //có r 
                if (isset($_SESSION['checkout_info']['cart']) && !empty($_SESSION['checkout_info']['cart'])) {
                    $cart_item = $_SESSION['checkout_info']['cart'][0];

                    // đổi l  reset giỏ đúng 
                    if ($new_ticket_id != $ticket_id) {



                        unset($_SESSION['checkout_info']['cart'][0]);
                        $_SESSION['checkout_info']['cart'] = [
                            [
                                'id' => $new_ticket_id,
                                'match_name' => $cart_item['match_name'],
                                'match_datetime' => $cart_item['match_datetime'],
                                'ticket_type_name' => $ticket_type['name'],
                                'price' => $price,
                                'qty' => $cart_item['qty']
                            ]
                        ];
                    } else {

                        
                        // k đỏi loại
                        $_SESSION['checkout_info']['cart'][0]['id'] = $new_ticket_id;
                        $_SESSION['checkout_info']['cart'][0]['price'] = $price;
                        $_SESSION['checkout_info']['cart'][0]['ticket_type_name'] = $ticket_type['name'];
                    }

                    //tổn tìn
                    $_SESSION['checkout_info']['total_price'] = $price;
                } else

                // the first time
                {
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
            } 
        } 
    }
}