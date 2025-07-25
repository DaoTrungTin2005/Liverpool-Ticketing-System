<?php 
function construct()
{
    load_model('cart');
}

function show_details_cartAction(){
    load_view('show_details_cart');
}


function add_to_cartAction() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id > 0) {
        $ticket = get_ticket_by_id($id); 

        if (!empty($ticket)) {
            // 🔎 Lấy các giá vé khác theo match_name + datetime
            $match_name = $ticket['match_name'];
            $match_datetime = $ticket['match_datetime'];

            $all_prices = get_prices_by_match($match_name, $match_datetime);

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] += 1;
            } else {
                $_SESSION['cart'][$id] = [
                    'id' => $ticket['id'],
                    'match_name' => $ticket['match_name'],
                    'image' => $ticket['image'],
                    'match_datetime' => $ticket['match_datetime'],
                    'ticket_type_name' => $ticket['ticket_type_name'],
                    'price' => $ticket['price'],
                    'normal_price' => $all_prices['normal_price'],
                    'average_price' => $all_prices['average_price'],
                    'vip_price' => $all_prices['vip_price'],
                    'qty' => 1
                ];
            }
        }
    }

    redirect($_SERVER['HTTP_REFERER']);
}


// cập nhật giỏ hàng trong $_SESSION['cart'].
// Khi người dùng click vào nút SVG + hoặc −, JavaScript sẽ gửi request AJAX (thường bằng fetch hoặc XMLHttpRequest) tới hàm PHP này (update_qtyAction).
// PHP sẽ cập nhật lại $_SESSION['cart'] theo yêu cầu.
function update_qtyAction() {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    
    // 'plus' hoặc 'minus'.
    $type = $_POST['type'] ?? '';

    if (isset($_SESSION['cart'][$id])) {
        if ($type == 'plus') {
            $_SESSION['cart'][$id]['qty'] += 1;
        } elseif ($type == 'minus' && $_SESSION['cart'][$id]['qty'] > 1) {
            $_SESSION['cart'][$id]['qty'] -= 1;
        }
    }
}



function get_prices_by_match() {
    $match_name = $_POST['match_name'] ?? '';
    $match_datetime = $_POST['match_datetime'] ?? '';

    // Gọi model để lấy dữ liệu từ DB
    $result = get_prices_by_match_and_datetime($match_name, $match_datetime);

    // Khởi tạo mảng giá theo loại vé
    $prices = [
        'normal_price' => null,
        'average_price' => null,
        'vip_price' => null,
    ];

    // Gán giá theo từng loại vé
    foreach ($result as $row) {
        switch ((int)$row['ticket_type_id']) {
            case 1:
                $prices['normal_price'] = $row['price'];
                break;
            case 2:
                $prices['average_price'] = $row['price'];
                break;
            case 3:
                $prices['vip_price'] = $row['price'];
                break;
        }
    }

    return $prices;
}

function get_ticket_pricesAction() {
    $prices = get_prices_by_match(); // Gọi lại hàm bạn đã viết

    header('Content-Type: application/json');
    echo json_encode($prices);
    exit; // Đảm bảo không có gì in ra thêm
}



?>