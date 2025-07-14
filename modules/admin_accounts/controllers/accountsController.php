<?php
function construct()
{
    load_model('accounts');
}

function showAction()
{

    load_view('show');
}



function createAction()
{
    global $error;
    $error = [];

    if (isset($_POST['btn-submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        // Kiểm tra dữ liệu
        if (empty($username) || !is_username($username)) {
            $error['username'] = "Username không hợp lệ (6-32 ký tự, chữ/số/gạch dưới)";
        }

        if (empty($password) || !is_password($password)) {
            $error['password'] = "Password phải bắt đầu bằng chữ hoa và dài tối thiểu 6 ký tự";
        }

        if (empty($email) || !is_email($email)) {
            $error['email'] = "Email không hợp lệ";
        }

        if (!is_role_selected($role)) {
            $error['role'] = "Bạn chưa chọn Role";
        }

        // Kiểm tra trùng tài khoản
        if (username_exists($username)) {
            $error['username'] = "Username đã tồn tại";
        }

        if (email_exists($email)) {
            $error['email'] = "Email đã tồn tại";
        }

        // Nếu không có lỗi thì insert vào DB
        if (empty($error)) {
            $data = [
                'username' => $username,
                'password' => md5($password),
                'email' => $email,

                // Kiểm tra xem giá trị radio button có phải là "ADMIN" không
                //? 1 : 2	Nếu đúng → gán 1, nếu sai → gán 2
                'role_id' => ($role == 'ADMIN') ? 1 : 2,
            ];
            insert_account($data);
            redirect("?mod=admin_accounts&controller=accounts&action=show");
        }
    }

    load_view('create');
}
