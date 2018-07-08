<?php

include_once('db.php');
class Balance
{

    static $id;
    static $user_id;
    static $amount;

    static function create_balance($id, $user_id){
        global $db;
        $sql = "INSERT INTO `bus_database`.`balances` (`id`, `user_id`, `amount`) VALUES (NULL, '".$user_id."', '0')";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_user_balance($user_id){
        global $db;
        $sql = "SELECT * FROM `balances` WHERE `user_id` = '".$user_id."' LIMIT 1";
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

    static function update_balance($user_id, $amount){

        global $db;
        $sql = "UPDATE `bus_database`.`balances` SET `amount` = '".$amount."' WHERE `balances`.`user_id` = '".$user_id."' ";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

}