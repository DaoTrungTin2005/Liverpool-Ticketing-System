<?php
function construct()
{
    load_model('accounts');
}

function showAction()
{
    // Kết quả là một mảng dữ liệu các user, được gán vào biến $data['list_users'].
    //     Ví dụ $data['list_users'] sẽ có dạng:
    // [
    //     ['id' => 1, 'username' => 'admin', 'email' => 'admin@example.com', 'role_name' => 'ADMIN'],
    //     ['id' => 2, 'username' => 'user', 'email' => 'user@example.com', 'role_name' => 'USER'],
    //     ...
    // ]
    $data['list_users'] = get_list_users_with_role();

    //Truyền mảng $data vào view để sử dụng
    load_view('show', $data);
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

function updateAction()
{
    global $error;
    $error = [];

    if (isset($_POST['btn-submit'])) {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $role_id = isset($_POST['role_id']) ? (int)$_POST['role_id'] : 0;

        // Validation như bên create
        if (empty($username) || !is_username($username)) {
            $error['username'] = "Username không hợp lệ (6-32 ký tự, chữ/số/gạch dưới)";
        }

        if (empty($email) || !is_email($email)) {
            $error['email'] = "Email không hợp lệ";
        }

        if ($role_id !== 1 && $role_id !== 2) {
            $error['role'] = "Role không hợp lệ";
        }

        if (empty($error)) {
            update_user($id, $username, $email, $role_id);
            redirect("?mod=admin_accounts&controller=accounts&action=show");
        }
    }

    // Nếu có lỗi thì load lại view cũ để hiển thị
    load_view('show');
}


function deleteAction() {
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        // Gọi model xóa
        $result = delete_account_by_id($id);

        redirect("?mod=admin_accounts&controller=accounts&action=show");
    }
}

?>