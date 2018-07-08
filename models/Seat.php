<?php

include_once('db.php');
class Seat
{

    static $id;
    static $number;
    static $bus_id;
    static $user_id;
    static $occupied;

    static function create_seat($id, $number, $bus_id){
        global $db;
        $sql = "INSERT INTO `bus_database`.`seats` (`id`, `bus_id`, `number`, `user_id`, `occupied`) VALUES (NULL, '".$bus_id."', '".$number."', '', 'unoccupied')";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function get_all_seats_by_bus($bus_id){
        global $db;
        $sql = "SELECT * FROM `seats` WHERE `bus_id` = '".$bus_id."'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }
    static function get_all_unoccupied_seats_by_bus($bus_id){
        global $db;
        $sql = "SELECT * FROM `seats` WHERE `bus_id` = '".$bus_id."' AND `occupied` = 'unoccupied'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }

    static function get_all_occupied_seats_by_bus($bus_id){
        global $db;
        $sql = "SELECT * FROM `seats` WHERE `bus_id` = '".$bus_id."' AND `occupied` = 'occupied'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }
    static function get_seat_by_id($id){
        global $db;
        $sql = "SELECT * FROM `seats` WHERE `id` = '".$id."' LIMIT 1";
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
    static function reserve_seat($id, $user_id){
        global $db;
        $sql = "UPDATE `bus_database`.`seats` SET `user_id` = '".$user_id."', `occupied` = 'occupied' WHERE `seats`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function clear_reserve($id){
        global $db;
        $sql = "UPDATE `bus_database`.`seats` SET `occupied` = 'unoccupied' WHERE `seats`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

}