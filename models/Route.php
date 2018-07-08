<?php

include_once('db.php');
class Route
{

    static $id;
    static $origin_id;
    static $destination_id;
    static $length;

    static function create_route($id, $origin_id, $destination_id, $length){

        global $db;
        $sql = "INSERT INTO `bus_database`.`routes` (`id`, `origin_id`, `destination_id`, `length`) VALUES (NULL, '".$origin_id."', '".$destination_id."', '".$length."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_routes(){
        global $db;
        $sql = "SELECT * FROM `routes`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
            //return $db_result;
        }
        else {
            return False;
        }
    }

    static function get_route_by_id($id){
        global $db;
        $sql = "SELECT * FROM `routes` WHERE `id` = '".$id."' LIMIT 1";
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

    static function delete_route($id){
        global $db;
        $sql =  "DELETE FROM `bus_database`.`routes` WHERE `routes`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
}