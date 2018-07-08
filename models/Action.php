<?php

include_once('db.php');
class Action
{
    static $id;
    static $action;
    static $type;
    static $date;

    static function create_action($id, $action, $type, $date){
        global $db;
        $sql = "INSERT INTO `bus_database`.`actions` (`id`, `action`, `type`, `date`) VALUES (NULL, '".$action."', '".$type."', '".$date."');";
        $db_result = $db->query($sql);
        if($db_result){
            return $db->lastInsertId('id');
        }
        else{
            return False;
        }
    }

    static function get_all_actions(){
        global $db;
        $sql = "SELECT * FROM `actions`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }

    }

    static function get_actions_by_type($type){
        global $db;
        $sql = "SELECT * FROM `actions` WHERE `type` = '".$type."'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }

    }

    static function get_actions_by_date($date){
        global $db;
        $sql = "SELECT * FROM `actions` WHERE `date` = '".$date."'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }

    }

    static function get_actions_by_type_and_date($type,$date){
        global $db;
        $sql = "SELECT * FROM `actions` WHERE `type` = '".$type."' AND `date` = '".$date."'";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }
}