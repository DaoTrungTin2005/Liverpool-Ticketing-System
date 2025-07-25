<?php

$config['vnpay'] = [
    'vnp_TmnCode'    => 'FCHZCH7R', // Mã website (Terminal ID)
    'vnp_HashSecret' => 'MMBHE4LTBNQ28G775FYG5HPZKMHE6XNJ', // Chuỗi bí mật
    'vnp_Url'        => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html', // URL thanh toán test
    'vnp_Returnurl'  => 'http://localhost/LIVERPOOL_TICKETING_SYSTEM/modules/checkout/vnpay_return.php' // Trang trả về sau thanh toán
];
?>