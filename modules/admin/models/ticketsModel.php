<?php

function add_ticket($data)
{
    return db_insert('tickets', $data);
} 

function get_list_tickets() {
    $sql = "SELECT t.*, tt.name AS ticket_type_name 
        FROM tickets t 
        JOIN ticket_types tt ON t.ticket_type_id = tt.id ";
    return db_fetch_array($sql);
}

function get_ticket_by_id($id) {
    return db_fetch_row("SELECT * FROM tickets WHERE id = {$id}");
}

function update_ticket($id, $image, $match_name, $match_datetime, $ticket_type_id, $price)
{
    $data = [
        'image' => $image,
        'match_name' => $match_name,
        'match_datetime' => $match_datetime,
        'ticket_type_id' => $ticket_type_id,
        'price' => $price
    ];

    $where = "id = {$id}";

    return db_update('tickets', $data, $where);
}