<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Route.php');
include_once ('../../models/Origin.php');
include_once ('../../models/Destination.php');

if(isset($_GET['route_id']) && isset($_GET['type'])) {

    if ($_GET['type'] == 'delete') {
        Route::delete_route($_GET['route_id']);

    }
    header('Location: index.php');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    if(Origin::get_origin_by_id($_GET['origin_id'])['name'] == Destination::get_destination_by_id($_GET['destination_id'])['name']){
        //$_GET['route_error'] = "set";
        header('Location: add_route.php?route_error=set');
        exit();
    }
    Route::create_route('',$_GET['origin_id'],$_GET['destination_id'],$_GET['length']);
    header('Location: index.php');
    exit();
}

function show_route($id){
    return Origin::get_origin_by_id(Route::get_route_by_id($id)['origin_id'])['name'].
            " - ".
            Destination::get_destination_by_id(Route::get_route_by_id($id)['destination_id'])['name'];
}