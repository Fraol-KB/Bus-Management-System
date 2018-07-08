<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Destination.php');

if(isset($_GET['destination_id']) && isset($_GET['type'])) {

    if ($_GET['type'] == 'delete') {
        Destination::delete_destination($_GET['destination_id']);

    }
    header('Location: index.php');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    Destination::create_destination('',$_GET['destination_name']);
    header('Location: index.php');
    exit();
}