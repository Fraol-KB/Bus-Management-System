<?php
include_once('../../session.php');
include_once ('../../models/db.php');
include_once ('../../models/Journey.php');
include_once ('../../models/Bus.php');
include_once ('../../models/Route.php');
include_once ('../../models/Origin.php');
include_once ('../../models/Destination.php');
include_once ('../../models/User.php');
include_once ('../../models/Balance.php');
include_once ('../../models/Reservation.php');
include_once ('../../models/Seat.php');
include_once ('../../models/Action.php');
include_once ('../../models/Driver.php');




if(isset($_GET['type']) && $_GET['type'] == 'cancel'){
    $reservation = Reservation::get_reservation_by_id($_GET['reservation_id']);
    $journey = Journey::get_journey_by_id($reservation['journey_id']);
//    if()
    $redeem_amount = intval($journey['price']) / 2;
    Balance::update_balance($_SESSION['user_id'], intval(Balance::get_user_balance($_SESSION['user_id'])['amount']) + $redeem_amount);
    Seat::clear_reserve($reservation['seat_id']);
    Action::create_action('', 'User ID - '.$_GET['coupon_code'].' canceled reservation on Journey ID - '.$journey['id'], 'cancel_reserve',getdate()[0] );
    Reservation::delete_reservation($reservation['id']);

    header('Location: index.php?cancel_success=set');
    exit();
}







function show_route($id){
    return Origin::get_origin_by_id(Route::get_route_by_id($id)['origin_id'])['name'].
    " - ".
    Destination::get_destination_by_id(Route::get_route_by_id($id)['destination_id'])['name'];
}