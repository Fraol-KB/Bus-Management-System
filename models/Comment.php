<?php

include_once('db.php');
class Comment
{
    static $id;
    static $user;
    static $comment;

    static function give_comment($id, $user, $comment){
        global $db;
        $sql = "INSERT INTO `bus_database`.`comments` (`id`, `user`, `comment`) VALUES (NULL, '".$user."', '".$comment."');";
        $db_result = $db->query($sql);
        if($db_result){
            return True;
        }
        else{
            return False;
        }
    }
    static function view_comment($id){
        global $db;
        $sql = "SELECT * FROM `comments` WHERE `id` = ".$id." LIMIT 1";
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
    static function get_all_comments(){
        global $db;
        $sql = "SELECT * FROM `comments`";

        $db_result = $db->query($sql);
        if($db_result){
            return $db_result->fetchAll();
        }
        else {
            return False;
        }
    }
}