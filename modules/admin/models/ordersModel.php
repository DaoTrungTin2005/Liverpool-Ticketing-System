<?php 
function get_orders()
{
    $sql = "SELECT o.*, a.email 
            FROM orders o 
            JOIN accounts a ON o.account_id = a.id 
            ORDER BY o.created_at DESC";
    return db_fetch_array($sql);
}

?>