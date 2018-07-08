<?php

include_once('../session.php');
include_once('../login_controller.php');
confirm_login('../index.php');
if(isset($_GET['logout'])){

    logout();
}
