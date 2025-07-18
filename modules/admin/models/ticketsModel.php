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