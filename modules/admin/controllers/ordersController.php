    <?php
    function construct()
    {

        // Tránh vòng lặp redirect vô hạn
        if ($_GET['action'] != '_404') {
            check_admin();
        }

        load_model('orders');
    }





function show_ordersAction()
{
    $data["orders"] =  get_orders();
    load_view('show_orders', $data);

}