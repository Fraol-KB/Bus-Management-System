<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Journey.php');
include_once ('../../models/Bus.php');
include_once ('../../models/Route.php');
include_once ('../../models/Origin.php');
include_once ('../../models/Destination.php');
include_once ('../../models/Driver.php');

if(isset($_GET['type']) && $_GET['type'] == 'search'){

    global $journey_search_list;
    $journey_search_list= array();

    for($i=0; $i < count(Journey::get_all_journeys()); $i++){
        $journey = Journey::get_all_journeys()[$i];
        $bus_plate_number = Bus::get_bus_by_id($journey['bus_id'])['plate_number'];
        $route_name = show_route(Bus::get_bus_by_id($journey['bus_id'])['route_id']);
        if(strpos($bus_plate_number,$_GET['search_term']) !== False ||
            strpos($route_name,$_GET['search_term']) !== False
        ){
            $journey_search_list[] = $journey;
        }
    }
    $_SESSION['search_list'] = $journey_search_list;
    header("Location: search_journey_list.php");
    exit();
}

if(isset($_GET['journey_id']) && isset($_GET['type'])) {

    if ($_GET['type'] == 'delete') {
        Journey::delete_journey($_GET['journey_id']);

    }
    header('Location: index.php');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    Journey::create_journey('', $_GET['bus_id'], $_GET['starting_date'], $_GET['starting_time'], $_GET['arrival_time'], $_GET['price']);
    header('Location: index.php');
    exit();
}


function show_route($id){
    return Origin::get_origin_by_id(Route::get_route_by_id($id)['origin_id'])['name'].
    " - ".
    Destination::get_destination_by_id(Route::get_route_by_id($id)['destination_id'])['name'];
}