<?php
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


    $sql = "SELECT ticket_type_id, price 
            FROM tickets 
            WHERE match_name = '{$match_name}' AND match_datetime = '{$match_datetime}'";

    return db_fetch_array($sql);
}

function get_price_by_type($match_name, $match_datetime, $ticket_type_id)
{
    $sql = "SELECT price FROM tickets 
            WHERE match_name = '{$match_name}' 
              AND match_datetime = '{$match_datetime}' 
              AND ticket_type_id = {$ticket_type_id}";
    $row = db_fetch_row($sql);
    return isset($row['price']) ? $row['price'] : 0;
}

function get_ticket_id_by_match_and_type($match_name, $match_datetime, $ticket_type_id) {
    $match_name = ($match_name);
    $match_datetime = ($match_datetime);
    $ticket_type_id = (int)$ticket_type_id;

    $sql = "SELECT id FROM tickets 
            WHERE match_name = '{$match_name}' 
            AND match_datetime = '{$match_datetime}' 
            AND ticket_type_id = {$ticket_type_id}
            LIMIT 1";

    return (int)db_fetch_row($sql)['id'];
}