<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once '../../config/vnpay.php';


if (!isset($_SESSION['checkout_info']['total_price']) || !is_numeric($_SESSION['checkout_info']['total_price'])) {
    die("Lỗi: Số tiền thanh toán không hợp lệ.");
}

// Tạo mã đơn hàng duy nhất
$order_id = time();
$order_desc = 'Thanh toán vé xem Liverpool'; 
$order_type = 'billpayment';
$amount = (int) ($_SESSION['checkout_info']['total_price'] * 100); 
$locale = 'vn';

$vnp_TmnCode = $config['vnpay']['vnp_TmnCode'];
$vnp_HashSecret = $config['vnpay']['vnp_HashSecret'];
$vnp_Url = $config['vnpay']['vnp_Url'];
$vnp_Returnurl = $config['vnpay']['vnp_Returnurl'];

$inputData = [
    "vnp_Version" => "2.1.0",
    "vnp_Command" => "pay",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $amount,
    "vnp_CurrCode" => "VND",
    "vnp_TxnRef" => $order_id,
    "vnp_OrderInfo" => $order_desc,
    "vnp_OrderType" => $order_type,
    "vnp_Locale" => $locale,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_IpAddr" => $_SERVER['REMOTE_ADDR']
];

// Sắp xếp các tham số
ksort($inputData);

// Tạo chuỗi hashdata với mã hóa URL cho các giá trị
$hashdataArr = [];
foreach ($inputData as $key => $value) {
    $hashdataArr[] = $key . '=' . urlencode($value);
}
$hashdata = implode('&', $hashdataArr);

// Tạo chữ ký bảo mật
$vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

// Tạo query string với mã hóa RFC 3986
$query = http_build_query($inputData, '', '&', PHP_QUERY_RFC3986);
$redirectUrl = $vnp_Url . '?' . $query . '&vnp_SecureHash=' . $vnp_SecureHash;

// Lưu dữ liệu debug
$_SESSION['debug_hash_send'] = [
    'hashdata' => $hashdata,
    'secure_hash' => $vnp_SecureHash,
    'url' => $redirectUrl,
    'input_data' => $inputData // Lưu thêm inputData để so sánh
];

// Hiển thị debug
echo "<h3>SESSION DEBUG:</h3>";
echo "<p><strong>Input Data:</strong> <pre>" . print_r($inputData, true) . "</pre></p>";
echo "<p><strong>Hash Data:</strong> " . htmlspecialchars($hashdata) . "</p>";
echo "<p><strong>Secure Hash:</strong> " . htmlspecialchars($vnp_SecureHash) . "</p>";
echo "<p><strong>Redirect URL:</strong> <a href='" . htmlspecialchars($redirectUrl) . "' target='_blank'>Link</a></p>";

// Chuyển hướng
header('Location: ' . $redirectUrl);
exit;
?>