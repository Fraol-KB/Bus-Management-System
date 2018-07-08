<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sami
 * Date: 5/17/2016
 * Time: 10:25 PM
 */
class Journey
{

    static $id;
    static $bus_id;
    static $starting_date;
    static $starting_time;
    static $arrival_time;
    static $price;


    static function create_journey($id, $bus_id, $starting_date, $starting_time, $arrival_time, $price){
        global $db;
        $sql = "INSERT INTO `bus_database`.`journeys` (`id`, `bus_id`, `starting_date`, `starting_time`, `arrival_time`, `price`) VALUES (NULL, '".$bus_id."', '".$starting_date."', '".$starting_time."', '".$arrival_time."', '".$price."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }

    }
    static function get_all_journeys(){
        global $db;
        $sql = "SELECT * FROM `journeys`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }
    static function get_journey_by_id($id){
        global $db;
        $sql = "SELECT * FROM `journeys` WHERE `id` = '".$id."' LIMIT 1";
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
    static function delete_journey($id){
        global $db;
        $sql =  "DELETE FROM `bus_database`.`journeys` WHERE `journeys`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

}