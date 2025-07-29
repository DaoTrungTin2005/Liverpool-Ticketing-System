    <?php
    function construct()
    {

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

           
            if (username_exists($username)) {
                $error['username'] = "Username đã tồn tại";
            }

            if (email_exists($email)) {
                $error['email'] = "Email đã tồn tại";
            }


            if (empty($error)) {
                $data = [
                    'username' => $username,
                    'password' => md5($password),
                    'email' => $email,


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

            
            delete_account_by_id($id);

            redirect("?mod=admin&controller=accounts&action=show_accounts");
        }
    }