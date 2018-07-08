<?php

include_once('../../session.php');

include_once('../../models/db.php');
include_once ('../../models/User.php');

if(isset($_GET['type']) && $_GET['type'] == 'change_password'){

    $user = User::get_user_by_id($_SESSION['user_id']);

    if($user ['password'] != $_GET['old_password']){

        if($_GET['new_password'] != $_GET['confirm_new_password']){
            header('Location: change_password.php?old_error=set&password_error=set');
            exit();
        }
        header('Location: change_password.php?old_error=set');
        exit();
    }

    if($_GET['new_password'] != $_GET['confirm_new_password']){

        if($user ['password'] != $_GET['old_password']){
            header('Location: change_password.php?old_error=set&password_error=set');
            exit();
        }

        header('Location: change_password.php?password_error=set');
        exit();
    }

    User::update_user_password($user['id'], $_GET['new_password']);

    header('Location: change_password.php?change_success=set');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'change_kebele_id'){

    $user = User::get_user_by_id($_SESSION['user_id']);



    User::update_user_kebele_id($user['id'], $_GET['new_kebele_id']);

    header('Location: change_kebele_id.php?change_success=set');
    exit();
}

if(isset($_GET['type']) && $_GET['type'] == 'change_phone_number'){

    $user = User::get_user_by_id($_SESSION['user_id']);



    User::update_user_phone_number($user['id'], $_GET['new_phone_number']);

    header('Location: change_phone_number.php?change_success=set');
    exit();
}