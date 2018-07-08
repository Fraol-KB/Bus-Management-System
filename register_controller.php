<?php

include_once ('session.php');
include_once ('models/db.php');
include_once ('models/User.php');
include_once ('models/Balance.php');

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    if(User::get_user_by_username($_GET['username']) != False){
        if($_GET['password'] != $_GET['confirm_password']){

            header('Location: user_register.php?username_error=set&password_error=set');
            exit();
        }

        header('Location: user_register.php?username_error=set');
        exit();
    }
    if($_GET['password'] != $_GET['confirm_password']){
        if(User::get_user_by_username($_GET['username']) != False){

            header('Location: user_register.php?username_error=set&password_error=set');
            exit();
        }

        header('Location: user_register.php?password_error=set');
        exit();
    }

    User::create_user('',$_GET['first_name'],$_GET['last_name'],$_GET['kebele_id'],$_GET['gender'],$_GET['username'],$_GET['password'],$_GET['email'],$_GET['phone_number']);
    Balance::create_balance('', User::get_user_by_username($_GET['username'])['id']);
    $user = User::get_user_by_username($_GET['username']);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_type'] = "user";

    header('Location: user_profile.php');
    exit();
}