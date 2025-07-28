<?php 


function insert_contact($account_id, $name, $phone, $message)
{

    $data = [
        'account_id' => $account_id,
        'name' => $name,
        'phone' => $phone,
        'message' => $message,
    ];

    return db_insert('contact', $data);
}

function get_email_by_account_id($account_id) {
    $sql = "SELECT email FROM accounts WHERE id = {$account_id}";
    $result = db_fetch_row($sql);
    return $result['email'] ?? '';
}

?>