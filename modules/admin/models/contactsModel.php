<?php 



// Lấy toàn bộ contact kèm email từ bảng accounts
function get_all_contacts_with_email()
{
    $sql = "SELECT contact.*, accounts.email 
            FROM contact 
            JOIN accounts ON contact.account_id = accounts.id
            ORDER BY contact.id DESC";

    return db_fetch_array($sql); // trả về mảng các liên hệ
}

?>