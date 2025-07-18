<?php

function add_ticket($data)
{
    return db_insert('tickets', $data);
}