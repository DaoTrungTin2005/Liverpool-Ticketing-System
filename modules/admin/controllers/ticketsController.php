<?php
function construct()
{
    // Khi action là _404 → không gọi check_admin() nữa
    // Tránh vòng lặp redirect vô hạn
    if ($_GET['action'] != '_404') {
        check_admin();
    }

    load_model('tickets');
}

function show_ticketsAction()
{
    if (!empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $data['list_tickets'] = search_tickets($keyword);
    } else {
        $data['list_tickets'] = get_list_tickets();
    }

    load_view('show_tickets', $data);
}





function create_ticketsAction()
{
    if (isset($_POST['submit'])) {
        $match_name = $_POST['match'] ?? '';
        $match_datetime = $_POST['date'] ?? '';
        $ticket_type_id = $_POST['vitri'] ?? 0;
        $price = $_POST['price'] ?? 0;

        $image_name = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

           
            $upload_dir = 'public/resources/uploads/';
            $image_name = basename($_FILES['image']['name']);

       

            $target_path = $upload_dir . $image_name;

            // di chuyển file ảnh tạm thời sang thư mục chính
            move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        }

        $data = [
            'image' => $image_name,
            'match_name' => $match_name,
            'match_datetime' => $match_datetime,
            'ticket_type_id' => $ticket_type_id,
            'price' => $price
        ];

        add_ticket($data);

        redirect("?mod=admin&controller=tickets&action=show_tickets");
        exit;
    }


    load_view('create_tickets');
}

function update_ticketsAction()
{
    $id = $_GET['id'] ?? 0;
    $ticket = get_ticket_by_id($id);

    if (!$ticket) {
        echo "Ticket not found.";
        return;
    }

    if (isset($_POST['submit'])) {
        $match_name = $_POST['match'] ?? '';
        $match_datetime = $_POST['date'] ?? '';
        $ticket_type_id = $_POST['vitri'] ?? 0;
        $price = $_POST['price'] ?? 0;

        // Giữ ảnh cũ 
        $image_name = $ticket['image'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $upload_dir = 'public/resources/uploads/';
            $image_name = basename($_FILES['image']['name']);
            $target_path = $upload_dir . $image_name;

            // Kiểm tra có bản ghi nào khác vẫn dùng ảnh cũ ko
            $old_image_path = $upload_dir . $ticket['image'];
            $image_used_by_others = db_fetch_row("SELECT * FROM tickets WHERE image = '{$ticket['image']}' AND id != {$id}");

            // Nếu ảnh cũ k còn được dùng bởi vé khác (id != $id) thì xóa file ảnh cũ .
            if (empty($image_used_by_others) && file_exists($old_image_path)) {
                unlink($old_image_path); // Chỉ xóa nếu không còn ai dùng
            }


            move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        }

        
        update_ticket($id, $image_name, $match_name, $match_datetime, $ticket_type_id, $price);

        redirect("?mod=admin&controller=tickets&action=show_tickets");
        exit;
    }

    // truyền bien dô
    load_view('update_tickets', ['ticket' => $ticket]);
}

function delete_ticketsAction()
{
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        
        delete_ticket_by_id($id);

        
        redirect("?mod=admin&controller=tickets&action=show_tickets");
    }
}