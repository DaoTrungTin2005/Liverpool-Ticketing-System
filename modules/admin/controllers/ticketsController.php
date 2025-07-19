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
    // Lấy danh sách vé từ database
    $data['list_tickets'] = get_list_tickets(); // Gọi model

    // Load view và truyền dữ liệu vào
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

            // đường dẫn tới thư mục trên server muốn lưu ảnh vào.
            $upload_dir = 'public/resources/uploads/';
            $image_name = basename($_FILES['image']['name']);

            // Ghép đường dẫn thư mục + tên file thành đường dẫn hoàn chỉnh
            // $target_path = 'public/resources/uploads/mu-vs-liverpool.jpg'
            $target_path = $upload_dir . $image_name;

            // Di chuyển file ảnh tạm thời (nơi PHP lưu khi upload) sang thư mục chính của bạn.
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

        // Redirect hoặc thông báo thành công
        header("Location: ?mod=admin&controller=tickets&action=show_tickets");
        exit;
    }

    // Load view nếu chưa submit
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

        // Giữ ảnh cũ nếu không upload ảnh mới
        $image_name = $ticket['image'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $upload_dir = 'public/resources/uploads/';
            $image_name = basename($_FILES['image']['name']);
            $target_path = $upload_dir . $image_name;

            // Kiểm tra có bản ghi nào khác vẫn dùng ảnh cũ không
            $old_image_path = $upload_dir . $ticket['image'];
            $image_used_by_others = db_fetch_row("SELECT * FROM tickets WHERE image = '{$ticket['image']}' AND id != {$id}");

            if (empty($image_used_by_others) && file_exists($old_image_path)) {
                unlink($old_image_path); // Chỉ xóa nếu không còn ai dùng
            }


            move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        }

        // Gọi hàm update_ticket theo dạng tham số riêng lẻ
        update_ticket($id, $image_name, $match_name, $match_datetime, $ticket_type_id, $price);

        redirect("?mod=admin&controller=tickets&action=show_tickets");
        exit;
    }

    load_view('update_tickets', ['ticket' => $ticket]);
}

function delete_ticketsAction()
{
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        // Gọi model xóa vé
        $result = delete_ticket_by_id($id);

        // Redirect lại trang danh sách vé
        redirect("?mod=admin&controller=tickets&action=show_tickets");
    }
}