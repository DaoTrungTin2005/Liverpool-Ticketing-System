<?php
function construct()
{

    load_model('home');
}

function homeAction()
{
    // Dùng lại model đã có
    $data['list_tickets'] = get_list_tickets();

    load_view('home', $data);
}