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

    load_view('show_tickets');
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