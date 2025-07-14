<?php

defined('APPPATH') or exit('Không được quyền truy cập phần này');

// get Controller name
function get_controller()
{
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}

// get Module name

function get_module()
{
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['default_module'];
    return $module;
}

//get Action name
function get_action()
{
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}

/*
 * -------------------------------
 * Load
 * ------------------------------------------------------------------------------------
 * Load các file từ các phân vùng vào hệ thống tham gia xử lý
 * Ví dụ: load('lib','database');
 * ------------------------------------------------------------------------------------
 * GIẢI THÍCH
 * ------------------------------------------------------------------------------------
 * Đầu vào
 * - $type: Loại phân vùng hệ thống: lib, helper...
 * - $name: Tên chức năng được load: database, string...
 * ------------------------------------------------------------------------------------
 */

//function run_module($url, $data_echo = true) {
////    global $config;
//    include  base_url().$url;
////    if (empty($url))
////        return FALSE;
////
////    if ($data_echo) {
////        echo get_data($url);
////    } else {
////        return get_data($url);
////    }
//}

function load($type, $name)
{
    if ($type == 'lib')
        $path = LIBPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if ($type == 'helper')
        $path = HELPERPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        require "$path";
    } else {
        echo "{$type}:{$name} không tồn tại";
    }
}

/*
 * -----------------------------
 * callFunction
 * -----------------------------
 * Gọi đến hàm theo tham số biến
 */

function call_function($list_function = array())
{
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (function_exists($f())) {
                $f();
            }
        }
    }
}

function load_view($name, $data_send = array()) {
    global $data;
    $data = $data_send;

    $module = get_module();       // e.g., admin
    $controller = get_controller(); // e.g., accounts

    $path = MODULESPATH . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name . 'View.php';

    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $v) {
                $$key = $v;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy view: {$path}";
    }
}



function load_model($name) {
    $module = get_module();
    $controller = get_controller();

    $path = MODULESPATH . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $name . 'Model.php';

    if (file_exists($path)) {
        require $path;
    } else {
        echo "Không tìm thấy model: {$path}";
    }
}
function get_header($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'header';
    } else {
        $name = "header-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_footer($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'footer';
    } else {
        $name = "footer-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_sidebar($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'sidebar';
    } else {
        $name = "sidebar-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_template_part($name)
{
    global $data;
    if (empty($name))
        return FALSE;
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . "template-{$name}.php";
    if (file_exists($path)) {
        foreach ($data as $key => $a) {
            $$key = $a;
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}