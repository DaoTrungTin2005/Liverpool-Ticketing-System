<?php

$account_id = isset($_SESSION['account']['id']) ? $_SESSION['account']['id'] : null;

function insert_order($fullname, $phone, $email, $total_price, $account_id)
{
    $order_code = 'ORD' . time();
    $data = [
        'order_code' => $order_code,
        'fullname' => $fullname,
        'phone' => $phone,
        'email' => $email,
        'total_amount' => $total_price,
        'created_at' => date('Y-m-d H:i:s'),
        'payment_status' => 'pending',
        'account_id' => $account_id
    ];
    $order_id = db_insert('orders', $data);
    return [
        'order_id' => $order_id,
        'order_code' => $order_code
    ];
}

function insert_order_item($order_id, $ticket_id, $qty, $price)
{
    $data = [
        'order_id' => $order_id,
        'ticket_id' => $ticket_id,
        'price' => $price,
        'qty' => $qty
    ];
    return db_insert('order_items', $data);
}

function get_ticket_by_id($id)
{
    $id = (int)$id;
    $sql = "SELECT t.*, tt.name AS ticket_type_name
            FROM tickets t
            JOIN ticket_types tt ON t.ticket_type_id = tt.id
            WHERE t.id = {$id}";
    return db_fetch_row($sql);
}

function get_prices_by_match_and_datetime($match_name, $match_datetime)
{
    $sql = "SELECT t.ticket_type_id, tt.name AS ticket_type_name, t.price
            FROM tickets t
            JOIN ticket_types tt ON t.ticket_type_id = tt.id
            WHERE t.match_name = '{$match_name}' AND t.match_datetime = '{$match_datetime}'";
    return db_fetch_array($sql);
}

function get_ticket_type_by_id($ticket_type_id) {
    $ticket_type_id = (int)$ticket_type_id;
    $sql = "SELECT * FROM ticket_types WHERE id = {$ticket_type_id}";
    return db_fetch_row($sql);
}

function get_ticket_id_by_match_datetime_and_type($match_name, $match_datetime, $ticket_type_id) {
    $ticket_type_id = (int)$ticket_type_id;

    $match_name = trim($match_name);
    $match_datetime = trim($match_datetime);
    $sql = "SELECT id FROM tickets 
            WHERE match_name = '$match_name' 
            AND match_datetime = '$match_datetime' 
            AND ticket_type_id = $ticket_type_id 
            LIMIT 1";
    $result = db_fetch_row($sql);
    if ($result) {
        return (int)$result['id'];
    } else {
        return null;
    }
}
?>