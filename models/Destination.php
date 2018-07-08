<?php

include_once('db.php');
class Destination
{
    static  $id;
    static $name;

    static function create_destination($id, $name){

        global $db;
        $sql = "INSERT INTO destinations(`id`,`name`) VALUES (NULL, '".$name."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_destinations(){

        global $db;
        $sql = "SELECT * FROM `destinations`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }

    }

    static function delete_destination($id){

        global $db;
        $sql =  "DELETE FROM `bus_database`.`destinations` WHERE `destinations`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_destination_by_id($id){

        global $db;
        $sql = "SELECT * FROM `destinations` WHERE `id` = ".$id." LIMIT 1";
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
}