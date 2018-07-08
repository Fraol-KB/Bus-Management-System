<?php
include_once("session.php");
include_once("models/db.php");
include_once('models/User.php');
include_once('models/Admin.php');


function check_login_account(){
    if (check_user_login_account()==true) {
        header("Location: user_profile.php");
        exit();
    }else if (check_admin_login_account()==true) {
        header("Location: admin/index.php");
        exit();
    }
}
function check_user_login_account(){

    $check = false;
    if(isset($_GET['login_type'])){

        $user_information = User::get_user_by_username($_GET["username"]);

        if($user_information != false){

            if($user_information["username"] == $_GET['username'] && $_GET['password'] == $user_information["password"] ){
                if($user_information['status'] == 'not_active'){
                    $_GET['access_error'] = 'set';
                }else{
                    $_SESSION['user_id'] = $user_information["id"];
                    $_SESSION['user_type'] = 'user';
                    $check = true;
                }

            }else{

                $_GET['login_error'] = 'set';
            }
        }else{

            $_GET['login_error'] = 'set';
        }

    }
    return $check;
    /*if($check == true){
        header("Location: user_profile.php");
        exit();
    }*/

}

function check_admin_login_account(){
    $check = false;
    if(isset($_GET['login_type'])){
        $user_information = Admin::get_admin_by_username($_GET['username']);
        $_GET['login_error'] = 'set';
        if($user_information != false){

            if($user_information["username"] == $_GET['username'] && $_GET['password'] == $user_information["password"] ){
                $_SESSION['user_id'] = $user_information["id"];
                $_SESSION['user_type'] = 'admin';
                $check = true;

            }
            $_GET['login_error'] = 'set';
        }
        $_GET['login_error'] = 'set';

    }

    return $check;

}