<?php
function construct()
{
    load_model('cart');
}

function show_details_cartAction()
{
    // Sắp xếp lại cart để tránh tình trạng nhảy hàng
    if (isset($_SESSION['cart'])) {
        uasort($_SESSION['cart'], function ($a, $b) {
            // Sắp xếp theo match_datetime tăng dần (hoặc match_name)
            return strtotime($a['match_datetime']) <=> strtotime($b['match_datetime']);
        });
    }

    load_view('show_details_cart');
}



function add_to_cartAction()
{
    

    if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
  
        redirect("?mod=auth&controller=auth&action=sign_in");
        return; 
    }

    
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id > 0) {
        $ticket = get_ticket_by_id($id);

        if (!empty($ticket)) {
            //  lấy các giá vé khác theo match_name + datetime
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
                    'qty' => 1,
                    'ticket_type_id' => $ticket['ticket_type_id'],
                ];
            }
        }
    }

    redirect("?mod=home&controller=home&action=home");
}


// cập nhật giỏ hàng trong $_SESSION['cart'].
//co xai AJAX
function update_qtyAction()
{
    header('Content-Type: application/json');

    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $type = $_POST['type'] ?? '';
    $ticket_type_id = isset($_POST['ticket_type_id']) ? (int)$_POST['ticket_type_id'] : 2;

    if (isset($_SESSION['cart'][$id])) {
        if ($type === 'plus') {
            $_SESSION['cart'][$id]['qty'] += 1;
        } elseif ($type === 'minus' && $_SESSION['cart'][$id]['qty'] > 1) {
            $_SESSION['cart'][$id]['qty'] -= 1;
        }

        // Cập nhật lại loại vé
        $_SESSION['cart'][$id]['ticket_type_id'] = $ticket_type_id;

        $match_name = $_SESSION['cart'][$id]['match_name'];
        $match_datetime = $_SESSION['cart'][$id]['match_datetime'];
        
        // Lấy lại giá và tên vé theo loại
        $prices = get_prices_by_match_and_datetime($match_name, $match_datetime);
        foreach ($prices as $row) {
            if ((int)$row['ticket_type_id'] === $ticket_type_id) {
                $_SESSION['cart'][$id]['price'] = $row['price'];
                $_SESSION['cart'][$id]['ticket_type_name'] = $row['ticket_type_name'];
                break;
            }
        }

        // ❗ Cập nhật lại ticket_id nếu loại vé đổi ➜ đổi key trong session
        $new_ticket_id = get_ticket_id_by_match_and_type($match_name, $match_datetime, $ticket_type_id);

        if ($new_ticket_id && $new_ticket_id != $id) {
            // Gộp nếu trùng
            if (isset($_SESSION['cart'][$new_ticket_id])) {
                $_SESSION['cart'][$new_ticket_id]['qty'] += $_SESSION['cart'][$id]['qty'];
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$new_ticket_id] = $_SESSION['cart'][$id];
                $_SESSION['cart'][$new_ticket_id]['id'] = $new_ticket_id;
                unset($_SESSION['cart'][$id]);
            }

            $id = $new_ticket_id; // cập nhật lại để trả về cho FE
        }

        echo json_encode([
            'success' => true,
            'new_id' => $id,
            'qty' => $_SESSION['cart'][$id]['qty'],
            'price' => $_SESSION['cart'][$id]['price'],
            'ticket_type_name' => $_SESSION['cart'][$id]['ticket_type_name'],
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}





function get_prices_by_match($match_name, $match_datetime)
{
    $result = get_prices_by_match_and_datetime($match_name, $match_datetime);

    $prices = [
        'normal_price' => null,
        'average_price' => null,
        'vip_price' => null,
    ];

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

function deleteAction()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }


    redirect("?mod=cart&controller=cart&action=show_details_cart");

    exit();
}