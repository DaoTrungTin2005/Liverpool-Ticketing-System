<?php
session_start();
require_once '../../config/vnpay.php';
require_once '../../helper/url.php';
require_once '../../modules/checkout/models/checkoutModel.php';
require_once '../../libraries/database.php';

$db = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'trungtin07012005',
    'database' => 'liverpool_ticketing_system',
);

db_connect($db);

date_default_timezone_set('Asia/Ho_Chi_Minh');

$vnp_HashSecret = $config['vnpay']['vnp_HashSecret'];

// Lấy tất cả tham số bắt đầu bằng "vnp_"
$vnpData = [];
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) === 'vnp_') {
        $vnpData[$key] = $value;
    }
}

// Lấy chữ ký từ VNPay
$vnp_SecureHash = $vnpData['vnp_SecureHash'] ?? '';
unset($vnpData['vnp_SecureHash']);
unset($vnpData['vnp_SecureHashType']);

// Sắp xếp các tham số
ksort($vnpData);

// Tạo chuỗi hashdata với mã hóa URL cho các giá trị
$hashDataArr = [];
foreach ($vnpData as $key => $value) {
    $hashDataArr[] = $key . '=' . urlencode($value);
}
$hashData = implode('&', $hashDataArr);

// Tạo chữ ký để so sánh
$myHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

// Kiểm tra chữ ký
if ($myHash === $vnp_SecureHash) {
    if ($vnpData['vnp_ResponseCode'] === '00') {
        echo "<h2 style='color:green;'>✅ Thanh toán thành công</h2>";
        echo "<p>Mã giao dịch: " . htmlspecialchars($vnpData['vnp_TxnRef']) . "</p>";
        echo "<p>Số tiền: " . number_format($vnpData['vnp_Amount'] / 100, 0, ',', '.') . " đ</p>";
        echo "<p>Thông tin đơn hàng: " . htmlspecialchars(urldecode($vnpData['vnp_OrderInfo'])) . "</p>";

        // Lưu thông tin giao dịch tạm vào session để xử lý ở controller
        $_SESSION['vnpay_payment_success'] = [
            'txn_ref' => $vnpData['vnp_TxnRef'],
            'amount' => (int)$vnpData['vnp_Amount'],
            'order_info' => urldecode($vnpData['vnp_OrderInfo']),
            'pay_date' => $vnpData['vnp_PayDate'],
        ];

        if (!isset($_SESSION['vnpay_payment_success'])) {
            $_SESSION['error'] = "Không có thông tin thanh toán.";
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

        // 2. Lưu từng item trong giỏ hàng hoặc Buy Now
        if (!empty($_SESSION['cart'])) {
            // Trường hợp giỏ hàng
            foreach ($_SESSION['cart'] as $item) {
                $price = (int)str_replace(',', '', $item['price']);
                $qty = $item['qty'] ?? 1;
                insert_order_item($order_id, $item['id'], $qty, $price);
            }
        }  elseif (!empty($_SESSION['checkout_info']['cart'])) {
    $cart_item = $_SESSION['checkout_info']['cart'][0];
    
    // Debug xem đúng chưa
    echo "<pre style='color:blue'>DEBUG Ticket ID: ";
    var_dump($cart_item['id']);
    echo "</pre>";

    $price = (int)$cart_item['price'];
    $qty = 1; // bạn nói không cần số lượng
    $ticket_id = $cart_item['id'];

    insert_order_item($order_id, $ticket_id, $qty, $price);
}


        // 3. Cập nhật trạng thái đơn hàng là 'paid'
        db_update('orders', ['payment_status' => 'paid'], "id = $order_id");

        // 4. Dọn session
        unset($_SESSION['cart']);
        unset($_SESSION['checkout_info']);
        unset($_SESSION['vnpay_payment_success']);
        unset($_SESSION['debug_hash_send']);

        // 5. Gửi thông báo và chuyển hướng
        $_SESSION['success'] = "Thanh toán và đặt vé thành công! Mã đơn: " . $order['order_code'];
        echo $_SESSION['success'];

    } else {
        echo "<h2 style='color:red;'>❌ Giao dịch thất bại</h2>";
        echo "<p>Mã lỗi: " . htmlspecialchars($vnpData['vnp_ResponseCode']) . "</p>";
        echo "<p>Thông tin lỗi: " . htmlspecialchars($vnpData['vnp_Message'] ?? 'Không có thông tin lỗi') . "</p>";
    }
} else {
    echo "<h2 style='color:red;'>❌ Sai chữ ký. Giao dịch không hợp lệ!</h2>";
    echo "<h3>Debug:</h3>";
    echo "<p><strong>Chữ ký từ VNPay:</strong> " . htmlspecialchars($vnp_SecureHash) . "</p>";
    echo "<p><strong>Chữ ký tự tạo:</strong> " . htmlspecialchars($myHash) . "</p>";
    echo "<p><strong>Chuỗi dữ liệu hash:</strong> " . htmlspecialchars($hashData) . "</p>";
    echo "<p><strong>Dữ liệu từ VNPay:</strong> <pre>" . print_r($vnpData, true) . "</pre></p>";

    // So sánh với dữ liệu gửi đi
    if (isset($_SESSION['debug_hash_send'])) {
        echo "<hr>";
        echo "<h3>🔍 Dữ liệu gửi đi trước đó:</h3>";
        echo "<p><strong>Input Data:</strong> <pre>" . print_r($_SESSION['debug_hash_send']['input_data'], true) . "</pre></p>";
        echo "<p><strong>Hash Data:</strong> " . htmlspecialchars($_SESSION['debug_hash_send']['hashdata']) . "</p>";
        echo "<p><strong>Secure Hash:</strong> " . htmlspecialchars($_SESSION['debug_hash_send']['secure_hash']) . "</p>";
        echo "<p><strong>Redirect URL:</strong> " . htmlspecialchars($_SESSION['debug_hash_send']['url']) . "</p>";
    }
}
?>