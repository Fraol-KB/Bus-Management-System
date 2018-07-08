<?php

include_once('../session.php');
confirm_login('../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once('../models/db.php');
include_once ('../models/Admin.php');

if(isset($_GET['type']) && $_GET['type'] == 'change_password'){

    $admin = Admin::get_admin_by_id($_SESSION['user_id']);

    if($admin['password'] != $_GET['old_password']){

        if($_GET['new_password'] != $_GET['confirm_new_password']){
            header('Location: change_password.php?old_error=set&password_error=set');
            exit();
        }
        header('Location: change_password.php?old_error=set');
        exit();
    }

    if($_GET['new_password'] != $_GET['confirm_new_password']){

        if($admin['password'] != $_GET['old_password']){
            header('Location: change_password.php?old_error=set&password_error=set');
            exit();
        }

        header('Location: change_password.php?password_error=set');
        exit();
    }

    Admin::update_admin_password($admin['id'], $_GET['new_password']);

    header('Location: change_password.php?change_success=set');
    exit();
}