<?php

include_once('db.php');
class Information
{

    static $id;
    static $title;
    static $description;

    static function post_information($id, $title, $description,$img){

        global $db;
        $sql = "INSERT INTO informations(`id`,`title`, `description`, `img` ) VALUES (NULL, '".$title."', '".$description."', '".$img."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function remove_information($id){

        global $db;
        $sql =  "DELETE FROM `bus_database`.`informations` WHERE `informations`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_informations(){
        global $db;
        $sql = "SELECT * FROM `informations` ORDER BY id DESC ";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }

    static function get_information_by_id($id){

        global $db;
        $sql = "SELECT * FROM `informations` WHERE `id` = '".$id."' LIMIT 1";
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

    static function search_information($title){

        global $db;
        $sql = "SELECT * FROM `informations` WHERE `title` = '".$title."'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }


}