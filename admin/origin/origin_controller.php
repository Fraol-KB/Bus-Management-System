<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Origin.php');

if(isset($_GET['origin_id']) && isset($_GET['type'])) {

    if ($_GET['type'] == 'delete') {
        Origin::delete_origin($_GET['origin_id']);

    }
    header('Location: index.php');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    Origin::create_origin('',$_GET['origin_name']);
    header('Location: index.php');
    exit();
}