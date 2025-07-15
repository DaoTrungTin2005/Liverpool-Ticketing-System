    <?php 
    function check_admin()
    {
        if (!isset($_SESSION['is_login']) || $_SESSION['user_role'] != 1) {
            // Nếu chưa đăng nhập hoặc không phải admin
            redirect("?mod=auth&controller=auth&action=_404");
            exit();
        }
    }
?>