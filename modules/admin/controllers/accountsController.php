    <?php
    function construct()
    {
        // Khi action là _404 → không gọi check_admin() nữa
        // Tránh vòng lặp redirect vô hạn
        if ($_GET['action'] != '_404') {
            check_admin();
        }

        load_model('accounts');
    }





function show_accountsAction()
{
    if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
        $keyword = $_GET['keyword'];
        $data['list_users'] = search_users_with_role($keyword);
    } else {
        $data['list_users'] = get_list_users_with_role();
    }

    load_view('show_accounts', $data);
}



    function create_accountsAction()
    {
        global $error;
        $error = [];

        if (isset($_POST['btn-submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            // isset($_POST['role']): kiểm tra xem key 'role' có tồn tại trong mảng $_POST hay không (tức là người dùng có chọn role không).
            // ? $_POST['role']: nếu có tồn tại, thì gán giá trị đó cho biến $role.
            // : null: nếu không tồn tại, thì gán giá trị null cho $role. (tránh hển thị lỗi nếu role ko có giá trị)
            $role = isset($_POST['role']) ? $_POST['role'] : null;

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
                redirect("?mod=admin&controller=accounts&action=show_accounts");
            }
        }

        load_view('create_accounts');
    }

    function update_accountsAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
            $username = isset($_POST['username']) ? trim($_POST['username']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $role_id = isset($_POST['role_id']) ? (int)$_POST['role_id'] : 0;

            if ($id > 0 && $username !== '' && $email !== '' && $role_id > 0) {
                update_user($id, $username, $email, $role_id);
            }

            redirect("?mod=admin&controller=accounts&action=show_accounts");
        }
    }


    function delete_accountsAction()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];

            // Gọi model xóa
            $result = delete_account_by_id($id);

            redirect("?mod=admin&controller=accounts&action=show_accounts");
        }
    }