<?php
// file khởi tạo để nạp file cấu hình,
// File này chuẩn bị môi trường (cấu hình, session, database) và chuyển quyền điều hướng sang router

ob_start();
session_start();

defined('APPPATH') OR exit('Không được quyền truy cập phần này');


require CONFIGPATH . DIRECTORY_SEPARATOR . 'database.php';


require CONFIGPATH . DIRECTORY_SEPARATOR . 'config.php';





require CONFIGPATH . DIRECTORY_SEPARATOR . 'autoload.php';


require LIBPATH . DIRECTORY_SEPARATOR . 'database.php';



require COREPATH . DIRECTORY_SEPARATOR . 'base.php';

require CONFIGPATH . DIRECTORY_SEPARATOR . 'vnpay.php';


// ếu $autoload (từ config/autoload.php) là mảng, vòng lặp sẽ nạp các file theo loại (lib, helper,...) và tên (database, url,...).

if (is_array($autoload)) {
    foreach ($autoload as $type => $list_auto) {
        if (!empty($list_auto)) {
            foreach ($list_auto as $name) {
                load($type, $name);
            }
        }
    }
}



db_connect($db);

require COREPATH . DIRECTORY_SEPARATOR . 'router.php';