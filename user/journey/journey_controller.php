<?php
include_once('../../session.php');
include_once ('../../models/db.php');
include_once ('../../models/Journey.php');
include_once ('../../models/Bus.php');
include_once ('../../models/Route.php');
include_once ('../../models/Origin.php');
include_once ('../../models/Destination.php');
include_once ('../../models/Balance.php');
include_once ('../../models/Reservation.php');
include_once ('../../models/Seat.php');
include_once ('../../models/Action.php');
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

if(isset($_GET['type']) && $_GET['type'] == 'reserve'){


    $journey = Journey::get_journey_by_id($_GET['journey_id']);
    if(!empty($_GET['seat_id'])) {
        if(count($_GET['seat_id']) * $journey['price'] > intval(Balance::get_user_balance($_SESSION['user_id'])['amount'])){
            header("Location: reserve.php?journey_id=".$journey['id']."&balance_error=set");
            exit();
        }else{
//            if(is_array($_GET['seat_id'])){
//                    for($i=0 ; count($_GET['seat_id']); $i++){
//    //                    echo $_GET['seat_id'][$i];
//    //                    echo "<br>";
//                    }
                foreach($_GET['seat_id'] as $seat_id){
                    echo $seat_id;
                    echo "<br>";
                    Reservation::create_reservation('', $_SESSION['user_id'], $_GET['journey_id'], $seat_id, getdate()[0]);
                    Balance::update_balance($_SESSION['user_id'],
                        intval(Balance::get_user_balance($_SESSION['user_id'])['amount']) - intval(Journey::get_journey_by_id($_GET['journey_id'])['price']));
                    Seat::reserve_seat($seat_id,$_SESSION['user_id']);
                    Action::create_action('', "User - ".$_SESSION['user_id'].'reserve Seat ID - '.$seat_id. " on Journey ID - ".$_GET['journey_id'],"reserve" , getdate()[0]);

                }
            if(count(Reservation::get_all_reservations_by_user($_SESSION['user_id'])) == 5){
                Balance::update_balance($_SESSION['user_id'] ,intval(Balance::get_user_balance($_SESSION['user_id'])['amount']) + 500);
                header('Location: index.php?reserve_success=set&reward=set');
                exit();
            }
            header('Location: index.php?reserve_success=set');
            exit();

        }

    }
    else{
        header("Location: reserve.php?journey_id=".$journey['id']."&seat_error=set");
        exit();
    }
//    exit();


}


function show_route($id){
    return Origin::get_origin_by_id(Route::get_route_by_id($id)['origin_id'])['name'].
    " - ".
    Destination::get_destination_by_id(Route::get_route_by_id($id)['destination_id'])['name'];
}