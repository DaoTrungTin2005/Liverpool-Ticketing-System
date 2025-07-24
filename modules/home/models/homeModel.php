<?php 
// lúc đổ dữ liệu ra phải truyền id ra để biết đó là vé nào để xử lí những chức năng tiếp theo
function get_list_tickets() {
$sql = "SELECT t.id, t.match_name, t.image, t.match_datetime, t.price
        FROM tickets t
        WHERE t.ticket_type_id = 2";
    return db_fetch_array($sql);
}
?>