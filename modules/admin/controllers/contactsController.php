    <?php
    function construct()
    {

        // Tránh vòng lặp redirect vô hạn
        if ($_GET['action'] != '_404') {
            check_admin();
        }

        load_model('contacts');
    }




function show_contactsAction()
{
    $data["contacts"] =  get_all_contacts_with_email(); 
    load_view('show_contacts', $data);

}