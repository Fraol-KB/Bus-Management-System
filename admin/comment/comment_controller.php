<?php

include_once('../../session.php');
include_once('../../login_controller.php');
//confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Comment.php');

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    Comment::give_comment('',$_GET['full_name'], $_GET['comment']);
    if(isset($_SESSION['user_id'])){

        header('Location: ../../user_profile.php');
        exit();
    }
    header('Location: index.php');
    exit();
}