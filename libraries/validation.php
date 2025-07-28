<?php


function is_username($username)
{
    $Sparttern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($Sparttern, $username, $matchs))
        return FALSE;
    else {
        return TRUE;
    }
}



function is_password($password)
{
    $Sparttern = "/^[A-Z][A-Za-z0-9_\.!@#$%^&*()]{5,31}$/";
    if (!preg_match($Sparttern, $password, $matchs))
        return FALSE;
    else {
        return TRUE;
    }
}


function is_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function is_role_selected($role)
{
    return !empty($role); 
    // trả về true nếu $role hông rỗng 
}


// Hàm thông báo lỗi 
function form_error($label_field)


{
    global $error;



    if (!empty($error[$label_field]))
        return  $error[$label_field];


    // Trả về nội dung lỗi tương ứng với field đó.


}





// Hàm giữ lại giá trị


function set_value($field_name)
{
//    kiểm tra coi người dùng có nhập dữ liệu khum.
//  có nhập  lấy dữ liệu đó



    return !empty($_POST[$field_name]) ? htmlspecialchars($_POST[$field_name]) : '';
} 




?>