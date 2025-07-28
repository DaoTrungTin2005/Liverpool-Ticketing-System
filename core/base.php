<?php

// File này là trung tâm điều hướng, quyết định file controller và hàm action sẽ được gọi.
// Mục đích: Lấy thông tin module, controller, và action từ URL (qua $_GET) hoặc dùng giá trị mặc định từ $config.


defined('APPPATH') OR exit('Không được quyền truy cập phần này');



// 🧭 get_controller() – get_module() – get_action()
// function get_controller() { ... }
// function get_module() { ... }
// function get_action() { ... }
// 📌 Mục đích: lấy thông tin điều hướng từ URL:

// http://localhost/?mod=page&controller=index&action=detail
// ➡ Kết quả:

// get_module() → "page"
// get_controller() → "index"
// get_action() → "detail"

// ⚠️ Nếu không có mod, controller, action → lấy giá trị mặc định từ $config. (default á)


// get Controller name
function get_controller() {
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}

// get Module name

function get_module() {
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['default_module'];
    return $module;
}

//get Action name
function get_action() {
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



// ✅ Ý nghĩa:
// Hàm này dùng để tự động require các file thư viện (lib) hoặc file hỗ trợ (helper) mà bạn cần dùng.

// 📦 Ví dụ:
// Nếu bạn gọi:
// load('lib', 'database');
// → Nó sẽ tìm file:
// libraries/database.php

// Nếu bạn gọi:
// load('helper', 'url');
// → Nó sẽ tìm:
// helper/url.php

// Mục đích: Nạp các file từ các thư mục như libraries hoặc helpers dựa trên loại và tên.
function load($type, $name) {
    if ($type == 'lib')
        $path = LIBPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if ($type == 'helper')
        $path = HELPERPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        
        //gọi ra
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

 
//  ✅ Chức năng:
// Hàm này sẽ gọi hàng loạt các hàm mà bạn truyền vào dưới dạng mảng.

// 📦 Ví dụ:
// call_function(['construct', 'indexAction']);
// → Nếu trong controller có hàm construct() và indexAction() thì nó sẽ gọi lần lượt 2 hàm đó.

// 📌 Tại sao làm vậy?
// Vì trong file router.php, sau khi xác định được controller, nó sẽ:
// call_function(['construct', 'tenHanhDong']);
 
function call_function($list_function = array()) {
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (function_exists($f)) {
                $f();
            }
        }
    }
}


// ✅ Mục đích:
// Hàm này dùng để hiển thị view tương ứng trong module hiện tại.

// 📦 Ví dụ:
// Bạn đang ở URL:
// ?mod=page&controller=index&action=detail

// Bạn gọi:
// load_view('detail', ['title' => 'Giới thiệu']);

// → Nó sẽ tìm đến:
// modules/page/views/detailView.php
// → Và truyền biến $title = 'Giới thiệu' vào file view đó.

function load_view($name, $data_send = array()) {
    global $data;
    $data = $data_send;
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name . 'View.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key_data => $v_data) {
                $$key_data = $v_data;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}


// ✅ Mục đích:
// Hàm này để load model cần dùng trong module hiện tại.

// 📦 Ví dụ:
// load_model('user');
// Nếu mod=users, thì nó sẽ load:
// modules/users/models/userModel.php

// → Bạn có thể viết trong controller như:
// load_model('user');
// $list_user = get_all_user(); // Hàm này định nghĩa trong model

function load_model($name) {
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $name . 'Model.php';
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}



?>