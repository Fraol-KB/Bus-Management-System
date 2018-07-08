<?php

include_once('db.php');
class User
{

    static $id;
    static $first_name;
    static $last_name;
    static $kebele_id_number;
    static $gender;
    static $username;
    static $password;
    static $email;
    static $phone_number;
    static $status;

    static function create_user($id, $first_name, $last_name , $kebele_id_number, $gender, $username, $password, $email, $phone_number){
        global $db;
        $sql = "INSERT INTO `bus_database`.`users` (`id`, `first_name`, `last_name`, `kebele_id_number`, `gender`, `username`, `password`, `email`, `phone_number`, `status`)
VALUES (NULL, '".$first_name."', '".$last_name."', '".$kebele_id_number."', '".$gender."', '".$username."', '".$password."', '".$email."', '".$phone_number."', 'active');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function get_all_users(){
        global $db;
        $sql = "SELECT * FROM `users`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }
    static function get_user_by_id($id){
        global $db;
        $sql = "SELECT * FROM `users` WHERE `id` = '".$id."' LIMIT 1";
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
    static function get_user_by_username($username){
        global $db;
        $sql = "SELECT * FROM `users` WHERE `username` = '".$username."' LIMIT 1";
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
    static function reactivate_user($id){
        global $db;
        $sql = "UPDATE `bus_database`.`users` SET `status` = 'active' WHERE `users`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function deactivate_user($id){
        global $db;
        $sql = "UPDATE `bus_database`.`users` SET `status` = 'not_active' WHERE `users`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function delete_user($id){
        global $db;
        $sql =  "DELETE FROM `bus_database`.`users` WHERE `users`.`id` = '".$id."'";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function update_user_password($id, $password){
        global $db;
        $sql = "UPDATE `bus_database`.`users` SET `password` = '".$password."' WHERE `users`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function update_user_kebele_id($id, $kebele_id_number){
        global $db;
        $sql = "UPDATE `bus_database`.`users` SET `kebele_id_number` = '".$kebele_id_number."' WHERE `users`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function update_user_phone_number($id, $phone_number){
        global $db;
        $sql = "UPDATE `bus_database`.`users` SET `phone_number` = '".$phone_number."' WHERE `users`.`id` = '".$id."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
}