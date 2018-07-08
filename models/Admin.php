<?php

include_once('db.php');
class Admin
{

    static $id;
    static $username;
    static $password;


    static function create_admin($id, $username, $password){
        global $db;
        $sql = "INSERT INTO `bus_database`.`admins` (`id`, `username`, `password`) VALUES (NULL, '".$username."', '".$password."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_admins(){
        global $db;
        $sql = "SELECT * FROM `admins`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }

    static function get_admin_by_id($id){
        global $db;
        $sql = "SELECT * FROM `admins` WHERE `id` = '".$id."' LIMIT 1";
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

    static function get_admin_by_username($username){
        global $db;
        $sql = "SELECT * FROM `admins` WHERE `username` = '".$username."' LIMIT 1";
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

    static function update_admin_password($id, $password){
        global $db;
        $sql = "UPDATE `bus_database`.`admins` SET `password` = '".$password."' WHERE `admins`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function delete_admin($id){
        global $db;
        $sql =  "DELETE FROM `bus_database`.`admins` WHERE `admins`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
}