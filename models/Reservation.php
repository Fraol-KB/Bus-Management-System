<?php

include_once('db.php');
class Reservation
{

    static $id;
    static $user_id;
    static $journey_id;
    static $seat_id;
    static $date;

    static function create_reservation($id, $user_id, $journey_id, $seat_id, $date){

        global $db;
        $sql = "INSERT INTO `bus_database`.`reservations` (`id`, `user_id`, `journey_id`, `seat_id`, `date`) VALUES (NULL, '".$user_id."', '".$journey_id."', '".$seat_id."', '".$date."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_reservations_by_user($user_id){

        global $db;
        $sql = "SELECT * FROM `reservations` WHERE `user_id` = '".$user_id."'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }

    static function get_reservation_by_id($id){
        global $db;
        $sql = "SELECT * FROM `reservations` WHERE `id` = '".$id."' LIMIT 1";
        if(!isset($sql)){
            echo "not set";
        }
        $db_result = $db->query($sql);
        if($db_result){
            $db_row = $db_result->fetch(PDO::FETCH_ASSOC);
            if($db_row){

                return $db_row;
            }
            else {
                return False;
            }
        }
        return False;
    }

    static function delete_reservation($id){
        global $db;
        $sql =  "DELETE FROM `bus_database`.`reservations` WHERE `reservations`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
}