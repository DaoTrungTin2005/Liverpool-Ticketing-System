<?php 
function get_ticket_by_id($id) {
    $id = (int)$id;
    $sql = "SELECT t.*, tt.name AS ticket_type_name
            FROM tickets t
            JOIN ticket_types tt ON t.ticket_type_id = tt.id
            WHERE t.id = {$id}";
    return db_fetch_row($sql);
}

?>