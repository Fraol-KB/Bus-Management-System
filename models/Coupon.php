<?php

include_once('db.php');
class Coupon
{

    static $id;
    static $code;
    static $value;
    static $is_redeemed;


    static function create_coupon($id, $code, $value){
        global $db;

        $sql = "INSERT INTO `bus_database`.`coupons` (`id`, `code`, `value`, `is_redeemed`) VALUES (NULL, '".$code."', '".$value."', 'not_used');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }

    static function get_all_coupons(){

        global $db;
        $sql = "SELECT * FROM `coupons` ORDER BY `value` ASC ";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }

    static function get_coupon_by_code($code){
        global $db;
        $sql = "SELECT * FROM `coupons` WHERE `code` = '".$code."' LIMIT 1";
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

    static function redeem_coupon($code){
        global $db;
        $sql = "UPDATE `bus_database`.`coupons` SET `is_redeemed` = 'used' WHERE `coupons`.`code` = '".$code."';";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }


}