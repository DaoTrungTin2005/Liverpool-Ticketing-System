<?php 



function get_list_tickets() {
    $sql = "SELECT t1.id, t1.match_name, t1.image, t1.match_datetime, t1.price
            FROM tickets t1
            INNER JOIN (
                SELECT match_name, match_datetime, MIN(ticket_type_id) AS min_type
                FROM tickets
                GROUP BY match_name, match_datetime
            ) t2 ON t1.match_name = t2.match_name 
            AND t1.match_datetime = t2.match_datetime 
            AND t1.ticket_type_id = t2.min_type";
    return db_fetch_array($sql);
}



function search_tickets_by_name($keyword) {
    $sql = "SELECT t1.id, t1.match_name, t1.image, t1.match_datetime, t1.price
            FROM tickets t1
            INNER JOIN (
                SELECT match_name, match_datetime, MIN(ticket_type_id) AS min_type
                FROM tickets
                 WHERE match_name LIKE '%$keyword%' OR match_datetime LIKE '%$keyword%'
                GROUP BY match_name, match_datetime
            ) t2 ON t1.match_name = t2.match_name 
                  AND t1.match_datetime = t2.match_datetime 
                  AND t1.ticket_type_id = t2.min_type";
    return db_fetch_array($sql);
}



?>