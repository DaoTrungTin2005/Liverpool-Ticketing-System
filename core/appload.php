<?php
ob_start();
session_start();

defined('APPPATH') OR exit('Không được quyền truy cập phần này');

// Include file config/database
require CONFIGPATH . DIRECTORY_SEPARATOR . 'database.php';

// Include file config/config
require CONFIGPATH . DIRECTORY_SEPARATOR . 'config.php';

// Include file config/email
require CONFIGPATH . DIRECTORY_SEPARATOR . 'email.php';

// Include file config/autoload
require CONFIGPATH . DIRECTORY_SEPARATOR . 'autoload.php';

// Include core database
require LIBPATH . DIRECTORY_SEPARATOR . 'database.php';

// Include core base

require COREPATH . DIRECTORY_SEPARATOR . 'base.php';

require CONFIGPATH . DIRECTORY_SEPARATOR . 'vnpay.php';




if (is_array($autoload)) {
    foreach ($autoload as $type => $list_auto) {
        if (!empty($list_auto)) {
            foreach ($list_auto as $name) {
                load($type, $name);
            }
        }
    }
}



//
//connect db
db_connect($db);

require COREPATH . DIRECTORY_SEPARATOR . 'router.php';