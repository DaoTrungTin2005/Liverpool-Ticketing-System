<?php
function construct()
{

    load_model('home');
}

function homeAction()
{
    
    if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
        $keyword = $_GET['keyword'];
        $data['list_tickets'] = search_tickets_by_name($keyword);
    } else {

        $data['list_tickets'] = get_list_tickets();
    }

    load_view('home', $data);
}