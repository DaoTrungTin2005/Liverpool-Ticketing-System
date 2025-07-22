<?php 
function get_list_tickets() {
$sql = "SELECT t.match_name, t.image, t.match_datetime, t.price
        FROM tickets t
        WHERE t.ticket_type_id = 2
        GROUP BY t.match_name, t.image, t.match_datetime, t.price";
    return db_fetch_array($sql);
}
?>