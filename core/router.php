<?php




// Tạo đường dẫn động đến file controller dựa trên module và controller lấy từ URL.
$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';


if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}


$action_name = get_action().'Action';

call_function(array('construct', $action_name));