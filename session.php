<?php
session_start();

function confirm_login($address){

    if(!isset($_SESSION['user_id'])){

        header('Location: '.$address);
        exit();
    }

    if(isset($_SESSION['user_id']) && $_SESSION['user_type'] != 'admin'){

        header('Location: '.$address);
        exit();
    }


}

function logout(){
    session_destroy();
    header("Location: index.php");
    exit();
}
?>