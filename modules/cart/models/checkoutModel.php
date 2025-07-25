<?php 
function insert_order($fullname, $phone, $email, $total_price)
{
    $order_code = 'ORD' . time();
    $data = [
        'order_code' => $order_code,
        'fullname' => $fullname,
        'phone' => $phone,
        'email' => $email,
        'total_amount' => $total_price,
        'created_at' => date('Y-m-d H:i:s'),
        'payment_status' => 'pending'
    ];
    $order_id = db_insert('orders', $data);
    return [
        'order_id' => $order_id,
        'order_code' => $order_code
    ];
}

function insert_order_item($order_id, $ticket_id,$qty, $price)
{
    $data = [
        'order_id' => $order_id,
        'ticket_id' => $ticket_id,
        'price' => $price,
        'qty' => $qty
    ];
    return db_insert('order_items', $data);
}
?>