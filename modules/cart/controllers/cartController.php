<?php 
function construct()
{
    load_model('cart');
}

function show_details_cartAction(){
    load_view('show_details_cart');
}


// Khi nhấn nút add_to_cart thì số lượng tro
function add_to_cartAction() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id > 0) {
        // Lấy thông tin vé từ DB
        $ticket = get_ticket_by_id($id); 

        if (!empty($ticket)) {
            // Khởi tạo session nếu chưa có
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Nếu vé đã có trong giỏ, tăng số lượng
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] += 1;
            } else {
                // Nếu chưa có, thêm mới
                $_SESSION['cart'][$id] = [
                    'id' => $ticket['id'],
                    'match_name' => $ticket['match_name'],
                    'image' => $ticket['image'],
                    'match_datetime' => $ticket['match_datetime'],
                    'ticket_type_name' => $ticket['ticket_type_name'],
                    'price' => $ticket['price'],
                    'qty' => 1
                ];
            }
        }
    }

    // Quay lại trang trước đó
         redirect($_SERVER['HTTP_REFERER']);
}


?>