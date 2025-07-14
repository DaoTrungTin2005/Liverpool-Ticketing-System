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
    return !empty($role); // Hoặc kiểm tra cụ thể là "ADMIN"/"USER"
}


// Hàm thông báo lỗi 
function form_error($label_field)

// ✅ Lấy biến $error từ bên ngoài vào trong hàm (biến $error này bạn đã khai báo ở phần xử lý form như sau):
// rray();
// → $error là một mảng chứa tất cả các lỗi xảy ra khi người dùng nhập sai form.
{
    global $error;



    if (!empty($error[$label_field]))
        return  $error[$label_field];

    //  return $error[$label_field];
    // ✅ Trả về nội dung lỗi tương ứng với field đó.

    // Ví dụ: nếu $label_field = 'password'
    // và $error['password'] = "Password không hợp lệ"
    // → Hàm này sẽ return "Password không hợp lệ".
}





// Hàm giữ lại giá trị

// ✅ Nhận một tham số $field_name – tức là tên của ô input bạn cần lấy lại giá trị.
// Ví dụ: 'username', 'email', 'password'…
function set_value($field_name)
{
//     ✅ Kiểm tra xem người dùng có nhập dữ liệu không.
// Nếu có nhập → Lấy dữ liệu đó

// 🟦 htmlspecialchars(...)
// 👉 Đây là hàm bảo vệ chống XSS (tấn công chèn mã độc).

    return !empty($_POST[$field_name]) ? htmlspecialchars($_POST[$field_name]) : '';
} 




?>