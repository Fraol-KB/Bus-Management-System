<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Driver.php');

if(isset($_GET['type']) && $_GET['type'] == 'search'){

    global $driver_search_list;
    $driver_search_list= array();

    for($i=0; $i < count(Driver::get_all_drivers()); $i++){
        $driver_name = Driver::get_all_drivers()[$i]['name'];
        $driver_phone_number = Driver::get_all_drivers()[$i]['phone_number'];
        if(strpos($driver_name,$_GET['search_term']) !== False ||
            strpos($driver_phone_number,$_GET['search_term']) !== False
        ){
            $driver_search_list[] = Driver::get_all_drivers()[$i];
        }
    }
    $_SESSION['search_list'] = $driver_search_list;
    header("Location: search_driver_list.php");
    exit();
}

if(isset($_GET['driver_id']) && isset($_GET['type'])) {

    if ($_GET['type'] == 'delete') {
        Driver::delete_driver($_GET['driver_id']);

    }
    header('Location: index.php');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'add') {

    Driver::create_driver('', $_GET['driver_name'], $_GET['driver_phone_number']);
    header('Location: index.php');
    exit();
}