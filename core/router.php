<?php
//Triệu gọi đến file xử lý thông qua request

// Kết nối với hệ thống: File này được nạp cuối cùng trong core/appload.php, sau khi các cấu hình và hàm cơ bản (từ core/base.php) đã sẵn sàn

// Tạo đường dẫn động đến file controller dựa trên module và controller lấy từ URL.
$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';

// Tạo đường dẫn động đến file controller dựa trên module và controller lấy từ URL.
if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

// quy ước phải có hậu tố
$action_name = get_action().'Action';

call_function(array('construct', $action_name));