<?php

include_once('db.php');
class Driver
{

    static $id;
    static $name;
    static $is_assigned;

    static function create_driver($id, $name, $phone_number){

        global $db;
        $sql = "INSERT INTO drivers(`id`,`name`, `phone_number`) VALUES (NULL, '".$name."', '".$phone_number."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_drivers(){

        global $db;
        $sql = "SELECT * FROM `drivers`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }

    }

    static function get_all_unassigned_drivers(){

        global $db;
        $sql = "SELECT * FROM `drivers` WHERE `is_assigned` = 'not_assigned'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }

    }

    static function update_driver($id, $name){

        global $db;
        $sql = "UPDATE `bus_database`.`drivers` SET `name` = '".$name."' WHERE `drivers`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function delete_driver($id){

        global $db;
        $sql =  "DELETE FROM `bus_database`.`drivers` WHERE `drivers`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_driver_by_id($id){

        global $db;
        $sql = "SELECT * FROM `drivers` WHERE `id` = '".$id."' LIMIT 1";
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

    static function assign_driver($id){
        global $db;
        $sql = "UPDATE `bus_database`.`drivers` SET `is_assigned` = 'assigned' WHERE `drivers`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
}