<?php
session_start();
require_once '../../config/vnpay.php';
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

        // Xóa session
        unset($_SESSION['cart']);
        unset($_SESSION['checkout_info']);
        unset($_SESSION['debug_hash_send']);
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