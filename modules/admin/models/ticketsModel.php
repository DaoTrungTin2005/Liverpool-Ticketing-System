    <?php

function add_ticket($data)
{
    return db_insert('tickets', $data);
} 

function get_list_tickets() {
    $sql = "SELECT t.*, tt.name AS ticket_type_name 
        FROM tickets t 
        JOIN ticket_types tt ON t.ticket_type_id = tt.id 
        ORDER BY t.id ASC";
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

function delete_ticket_by_id($id) {
    $id = (int)$id;
    return db_delete('tickets', "id = {$id}");
}

function search_tickets($keyword) {

    $sql = "SELECT t.*, tt.name AS ticket_type_name 
            FROM tickets t 
            JOIN ticket_types tt ON t.ticket_type_id = tt.id 
            WHERE t.match_name LIKE '%{$keyword}%' 
               OR t.match_datetime LIKE '%{$keyword}%'
               OR t.price LIKE '%{$keyword}%'
            ORDER BY t.id ASC";
    return db_fetch_array($sql);
}