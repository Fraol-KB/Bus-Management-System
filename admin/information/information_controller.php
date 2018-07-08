<?php
include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');

include_once ('../../models/db.php');
include_once ('../../models/Information.php');

if(isset($_GET['information_id']) && isset($_GET['type'])) {

    if ($_GET['type'] == 'delete') {
        Information::remove_information($_GET['information_id']);

    }
    header('Location: index.php');
    exit();
}

if(isset($_POST['type']) && $_POST['type'] == 'add'){
    $img=null;

    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../upload/" . $_FILES["image"]["name"]);
        $img=$_FILES["image"]["name"];
    }
    Information::post_information('', $_POST['title'], $_POST['description'],$img);
    header('Location: index.php');
    exit();
}

