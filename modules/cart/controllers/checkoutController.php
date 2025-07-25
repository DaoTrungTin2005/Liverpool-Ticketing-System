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

            // Insert order
            $order = insert_order($fullname, $phone, $email, $total_price);
            $order_id = $order['order_id'];

            // Insert order_items
            foreach ($_SESSION['cart'] as $item) {
                $price = (int) str_replace(',', '', $item['price']);
                $qty = $item['qty'] ?? 1;
                insert_order_item($order_id, $item['id'], $qty, $price);
            }

            unset($_SESSION['cart']);

            $_SESSION['success'] = "Đặt hàng thành công! Mã đơn: " . $order['order_code'];
            redirect("?mod=cart&controller=checkout&action=success");
            exit;
        } else {
            $_SESSION['error'] = "Giỏ hàng đang trống!";
        }
    }

    load_view('checkout_addtocart');
}

function successAction() {
    load_view('success');
}

?>