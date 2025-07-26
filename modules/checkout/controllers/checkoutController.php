<?php 

function construct() {
        load_model('checkout');
    }

    // function checkout_addtocartAction() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $fullname = $_POST['fullname'] ?? '';
    //         $phone = $_POST['phone'] ?? '';
    //         $email = $_POST['email'] ?? '';

    //         $total_price = 0;
    //         if (!empty($_SESSION['cart'])) {
    //             foreach ($_SESSION['cart'] as $item) {
    //                 $price = (int) str_replace(',', '', $item['price']);
    //                 $qty = $item['qty'] ?? 1;
    //                 $total_price += $price * $qty;
    //             }

    //             // Insert order
    //             $account_id = $_SESSION['account']['id'] ?? null;
                
    //             $order = insert_order($fullname, $phone, $email, $total_price,$account_id);
    //             $order_id = $order['order_id'];

    //             // Insert order_items
    //             foreach ($_SESSION['cart'] as $item) {
    //                 $price = (int) str_replace(',', '', $item['price']);
    //                 $qty = $item['qty'] ?? 1;
    //                 insert_order_item($order_id, $item['id'], $qty, $price);
    //             }

    //             unset($_SESSION['cart']);

    //             $_SESSION['success'] = "Đặt hàng thành công! Mã đơn: " . $order['order_code'];
    //             redirect("?mod=checkout&controller=checkout&action=success");
    //             exit;
    //         } else {
    //             $_SESSION['error'] = "Giỏ hàng đang trống!";
    //         }
    //     }

    //     load_view('checkout_addtocart');
    // }

    // function successAction() {
    //     load_view('success');
    // }
    
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


    function vnpay_successAction() {
        if (!isset($_SESSION['vnpay_payment_success'])) {
            $_SESSION['error'] = "Không có thông tin thanh toán.";
            redirect("?mod=home&action=index");
        }

        $payment = $_SESSION['vnpay_payment_success'];
        $fullname = $_SESSION['checkout_info']['fullname'] ?? '';
        $phone = $_SESSION['checkout_info']['phone'] ?? '';
        $email = $_SESSION['checkout_info']['email'] ?? '';
        $total_price = $payment['amount'] / 100; // Vì nhân 100 khi gửi sang VNPay
        $account_id = $_SESSION['account']['id'] ?? null;

        // 1. Lưu đơn hàng
        $order = insert_order($fullname, $phone, $email, $total_price, $account_id);
        $order_id = $order['order_id'];

        // 2. Lưu từng item trong giỏ hàng
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $price = (int) str_replace(',', '', $item['price']);
                $qty = $item['qty'] ?? 1;
                insert_order_item($order_id, $item['id'], $qty, $price);
            }
        }

        // 3. Cập nhật trạng thái đơn hàng là 'paid'
        db_update('orders', ['payment_status' => 'paid'], "id = $order_id");

        // 4. Dọn session
        unset($_SESSION['cart']);
        unset($_SESSION['checkout_info']);
        unset($_SESSION['vnpay_payment_success']);

        // 5. Gửi thông báo và chuyển hướng
        $_SESSION['success'] = "Thanh toán và đặt vé thành công! Mã đơn: " . $order['order_code'];
        redirect("?mod=checkout&controller=checkout&action=success");
    }



    ?>