<?php

include_once('db.php');
class Bus
{

    static $id;
    static $plate_number;
    static $driver_id;
    static $route_id;
    static $number_of_seats;

    static function create_bus($id, $plate_number, $number_of_seats){

        global $db;
        //$sql = "INSERT INTO `buses` (`id`, `plate_number`, `driver_id`, `route_id`, `number_of_seats`) VALUES (NULL, '".$plate_number."', '', '', '".$number_of_seats."')";
        $sql = "INSERT INTO `buses` (`id`, `plate_number`, `driver_id`, `route_id`, `number_of_seats`) VALUES (NULL, '".$plate_number."', '0', '0', '".$number_of_seats."')";
        
        $db_result = $db->query($sql);
        if($db_result){
            return $db->lastInsertId('id');
        }
        else{
            return False;
        }
    }

    static function get_bus_by_id($id){
        global $db;
        $sql = "SELECT * FROM `buses` WHERE `id` = '".$id."' LIMIT 1";
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

    static function get_all_buses(){
        global $db;
        $sql = "SELECT * FROM `buses`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }

    static function get_all_buses_with_routes(){
        global $db;
        $sql = "SELECT * FROM `buses` WHERE `route_id` != '0'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }

    static function delete_bus($id){
        global $db;
        $sql =  "DELETE FROM `bus_database`.`buses` WHERE `buses`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function assign_driver($bus_id, $driver_id){
        global $db;
        $sql = "UPDATE `bus_database`.`buses` SET `driver_id` = '".$driver_id."' WHERE `buses`.`id` = '".$bus_id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function assign_route($bus_id,$route_id){
        global $db;
        $sql = "UPDATE `bus_database`.`buses` SET `route_id` = '".$route_id."' WHERE `buses`.`id` = '".$bus_id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
}