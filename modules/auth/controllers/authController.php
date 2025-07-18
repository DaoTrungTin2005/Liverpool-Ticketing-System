<?php
function construct()
{
    load_model('auth');
}

function sign_inAction()
{
    global $error;
    $error = [];

    if (isset($_POST['btn-submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username)) {
            $error['username'] = "Vui lòng nhập Username";
        }

        if (empty($password)) {
            $error['password'] = "Vui lòng nhập Password";
        }

        if (empty($error)) {
            // Lấy thông tin tài khoản từ DB
            $data = get_account_by_username($username); // model xử lý SELECT * FROM accounts WHERE username = '$username'

            if (!empty($data)) {
                if (md5($password) === $data['password']) {
                    // Đăng nhập thành công
                    $_SESSION['is_login'] = true;
                    $_SESSION['user_login'] = $data['username'];

                    //Sau này có thể dùng để phân quyền: admin mới được truy cập trang quản lý, còn user thì không.
                    $_SESSION['user_role'] = $data['role_id'];

                    // ✅ PHÂN QUYỀN CHUYỂN TRANG
                    if ($data['role_id'] == 1) {
                        // ADMIN → về trang quản trị
                        redirect("?mod=admin&controller=accounts&action=show_accounts");
                    } else {
                        // USER → về trang home
                        redirect("?mod=home&controller=home&action=home");
                    }
                } else {
                    $error['password'] = "Mật khẩu không chính xác";
                }
            } else {
                $error['username'] = "Tài khoản không tồn tại";
            }
        }
    }

    load_view('sign_in');
}

function sign_upAction()
{
    global $error;
    $error = [];

    if (isset($_POST['btn-submit'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($username)) {
            $error['username'] = "Vui lòng nhập Username";
        } elseif (!is_username($username)) {
            $error['username'] = "Username có 6-32 ký tự, chữ/số/gạch dưới";
        }

        if (empty($email)) {
            $error['email'] = "Vui lòng nhập Email";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email không hợp lệ";
        }

        if (empty($password)) {
            $error['password'] = "Vui lòng nhập mật khẩu";
        } elseif (!is_password($password)) {
            $error['password'] = "Password bắt đầu chữ hoa, dài tối thiểu 6 ký tự";
        }

        // Kiểm tra trùng tài khoản
        if (username_exists($username)) {
            $error['username'] = "Username đã tồn tại";
        }

        if (email_exists($email)) {
            $error['email'] = "Email đã tồn tại";
        }

        if (empty($confirm_password)) {
            $error['confirm_password'] = "Vui lòng xác nhận mật khẩu";
        } elseif ($password !== $confirm_password) {
            $error['confirm_password'] = "Mật khẩu xác nhận không khớp";
        }

        // Nếu không có lỗi thì insert
        if (empty($error)) {
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'role_id' => 2
            ];
            insert_account($data);
            redirect("?mod=auth&controller=auth&action=sign_in");
        }
    }

    load_view('sign_up'); // Không truyền error
}

function logoutAction()
{
    session_destroy(); // Xóa toàn bộ session
    redirect("?mod=auth&controller=auth&action=sign_in"); // Quay về trang đăng nhập
}

function _404Action()
{
    load_view('_404');
}