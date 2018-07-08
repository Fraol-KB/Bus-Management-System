<?php
include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Bus.php');
include_once ('../../models/Driver.php');
include_once ('../../models/Route.php');
include_once ('../../models/Origin.php');
include_once ('../../models/Destination.php');
include_once ('../../models/Seat.php');

if(isset($_GET['bus_id']) && isset($_GET['type'])){

    if($_GET['type'] == 'delete'){
        Bus::delete_bus($_GET['bus_id']);

    }

    if($_GET['type'] == 'assign_driver'){
        Bus::assign_driver($_GET['bus_id'], $_GET['driver_id']);
        Driver::assign_driver($_GET['driver_id']);
    }

    if($_GET['type'] == 'assign_route'){
        Bus::assign_route($_GET['bus_id'], $_GET['route_id']);
    }

    header('Location: index.php');
    exit();

}

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    $bus = Bus::create_bus('', $_GET['plate_no'], $_GET['no_of_seats']);
    $number_of_seats = intval(Bus::get_bus_by_id($bus)['number_of_seats']);
    for($i=0; $i < $number_of_seats; $i++){
        Seat::create_seat('',$i+1, Bus::get_bus_by_id($bus)['id']);
    }
    header('Location: index.php');
    exit();
}

function show_route($id){
    return Origin::get_origin_by_id(Route::get_route_by_id($id)['origin_id'])['name'].
    " - ".
    Destination::get_destination_by_id(Route::get_route_by_id($id)['destination_id'])['name'];
}

function check_driver_assign($id){

    if(Bus::get_bus_by_id($id)['driver_id'] == 0){
        return "Driver not assigned";
    }

    else{
        return Driver::get_driver_by_id(Bus::get_bus_by_id($id)['driver_id'])['name'];
    }
}

function check_route_assign($id){
    if(Bus::get_bus_by_id($id)['route_id'] == 0){
        return "Route not assigned";
    }

    else{
        return show_route(Bus::get_bus_by_id($id)['route_id']);
    }
}