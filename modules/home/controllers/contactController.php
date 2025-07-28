<?php 

function construct()
{

    load_model('contact');
}


function contactAction()
{
    $email = '';
    if (isset($_SESSION['account']['id'])) {
        $account_id = $_SESSION['account']['id'];
        $email = get_email_by_account_id($account_id);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($account_id)) {
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $message = $_POST['message'] ?? '';

            insert_contact($account_id, $name, $phone, $message);
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('You need to sign in to send us a message');</script>";
            redirect("?mod=auth&controller=auth&action=sign_in");
        }
    }

    // Truyền email sang view
    $data['email'] = $email;
    load_view('contact', $data);
}



?>