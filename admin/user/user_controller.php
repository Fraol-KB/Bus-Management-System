<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/User.php');
include_once ('../../models/Balance.php');

if(isset($_GET['user_id']) && isset($_GET['type'])) {

    if ($_GET['type'] == 'delete') {
        User::delete_user($_GET['user_id']);

    }

    if ($_GET['type'] == 'reactivate') {
        User::reactivate_user($_GET['user_id']);

    }

    if ($_GET['type'] == 'deactivate') {
        User::deactivate_user($_GET['user_id']);

    }
    header('Location: index.php');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'add'){
    if(User::get_user_by_username($_GET['username']) != False){
        if($_GET['password'] != $_GET['confirm_password']){

            header('Location: add_user.php?username_error=set&password_error=set');
            exit();
        }

        header('Location: add_user.php?username_error=set');
        exit();
    }
    if($_GET['password'] != $_GET['confirm_password']){
        if(User::get_user_by_username($_GET['username']) != False){

            header('Location: add_user.php?username_error=set&password_error=set');
            exit();
        }

        header('Location: add_user.php?password_error=set');
        exit();
    }

    User::create_user('',$_GET['first_name'],$_GET['last_name'],$_GET['kebele_id'],$_GET['gender'],$_GET['username'],$_GET['password'],$_GET['email'],$_GET['phone_number']);
    Balance::create_balance('', User::get_user_by_username($_GET['username'])['id']);
    header('Location: index.php');
    exit();
}

