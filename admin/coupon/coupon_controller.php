<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once ('../../models/db.php');
include_once ('../../models/Coupon.php');

if(isset($_GET['type']) && $_GET['type'] == 'add'){

    for($i = 0; $i < intval($_GET['no_of_coupons']); $i++){
        $code = $_GET['coupon_prefix']. rand(100000,999999);

        Coupon::create_coupon('',$code, $_GET['value_of_coupons']);
    }
    header('Location: index.php');
    exit();
}