<?php

function username_exists($username)
{
    $sql = "SELECT * FROM accounts WHERE username = '{$username}'";
    $result = db_num_rows($sql);
    return ($result > 0);
}

function email_exists($email)
{
    $sql = "SELECT * FROM accounts WHERE email = '{$email}'";
    $result = db_num_rows($sql);
    return ($result > 0);
}

function insert_account($data)
{
    return db_insert('accounts', $data);
}

//===============================================================

// Mục đích: lấy danh sách tất cả người dùng kèm tên role của họ (role_name) thông qua JOIN bảng accounts và roles.
function get_list_users_with_role()
{
    $sql = "SELECT a.*, r.name AS role_name 
            FROM accounts AS a
            LEFT JOIN roles AS r ON a.role_id = r.id";

    $result = db_fetch_array($sql);
    return $result;
}
