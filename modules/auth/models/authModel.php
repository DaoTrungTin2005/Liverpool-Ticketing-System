<?php function username_exists($username)
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

function get_account_by_username($username)
{
  
    $sql = "SELECT * FROM accounts WHERE username = '$username'";
    return db_fetch_row($sql);
}