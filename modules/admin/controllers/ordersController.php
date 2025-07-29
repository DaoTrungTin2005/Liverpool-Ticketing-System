    <?php
    function construct()
    {

        // Tránh vòng lặp redirect vô hạn
        if ($_GET['action'] != '_404') {
            check_admin();
        }

        load_model('contacts');
    }




function show_ordersAction()
{

    load_view('show_orders', );

}