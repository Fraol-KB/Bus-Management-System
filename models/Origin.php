<?php

include_once('db.php');
class Origin
{

    static $origin_id;
    static $name;

    static function create_origin($id, $name){

        global $db;
        $sql = "INSERT INTO origins(`id`,`name`) VALUES (NULL, '".$name."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_origins(){

        global $db;
        $sql = "SELECT * FROM `origins`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }

    }

    static function delete_origin($id){

        global $db;
        $sql =  "DELETE FROM `bus_database`.`origins` WHERE `origins`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_origin_by_id($id){

        global $db;
        $sql = "SELECT * FROM `origins` WHERE `id` = ".$id." LIMIT 1";
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