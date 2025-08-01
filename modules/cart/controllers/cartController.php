<?php
function construct()
{
    load_model('cart');
}

function show_details_cartAction()
{

    if (isset($_SESSION['cart'])) {
        uasort($_SESSION['cart'], function ($a, $b) {
            
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

                    'qty' => 1,
                    'ticket_type_id' => $ticket['ticket_type_id'],
                ];
            }
        }
    }

    redirect("?mod=home&controller=home&action=home");
}



function update_qtyAction()
{
    header('Content-Type: application/json');

    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $type = $_POST['type'] ?? '';
    $ticket_type_id = isset($_POST['ticket_type_id']) ? (int)$_POST['ticket_type_id'] : 1;

    if (isset($_SESSION['cart'][$id])) {
        if ($type === 'plus') {
            $_SESSION['cart'][$id]['qty'] += 1;
        } elseif ($type === 'minus' && $_SESSION['cart'][$id]['qty'] > 1) {
            $_SESSION['cart'][$id]['qty'] -= 1;
        }

        //ập nhật lại giá và tên loại đúng vs loại ht .                   llấy lại giá và tên vé theo loại
        $_SESSION['cart'][$id]['ticket_type_id'] = $ticket_type_id;

               
        $match_name = $_SESSION['cart'][$id]['match_name'];
        $match_datetime = $_SESSION['cart'][$id]['match_datetime'];
        

        $prices = get_prices_by_match_and_datetime($match_name, $match_datetime);
        foreach ($prices as $row) {
            if ((int)$row['ticket_type_id'] === $ticket_type_id) {
                $_SESSION['cart'][$id]['price'] = $row['price'];
                $_SESSION['cart'][$id]['ticket_type_name'] = $row['ticket_type_name'];
                break;
            }
        }


        
        // GỘP để hông nó bị trunfg 
        $new_ticket_id = get_ticket_id_by_match_and_type($match_name, $match_datetime, $ticket_type_id);

        if ($new_ticket_id && $new_ticket_id != $id) {
            
            if (isset($_SESSION['cart'][$new_ticket_id])) {
                $_SESSION['cart'][$new_ticket_id]['qty'] += $_SESSION['cart'][$id]['qty'];
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$new_ticket_id] = $_SESSION['cart'][$id];
                $_SESSION['cart'][$new_ticket_id]['id'] = $new_ticket_id;
                unset($_SESSION['cart'][$id]);
            }

            $id = $new_ticket_id; 
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