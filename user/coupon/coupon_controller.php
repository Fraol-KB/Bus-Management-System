<?php
include_once ('../../session.php');
include_once ('../../models/db.php');
include_once ('../../models/Coupon.php');
include_once ('../../models/Balance.php');
include_once ('../../models/Action.php');

if(isset($_GET['type']) && $_GET['type'] == 'claim'){

    if(Coupon::get_coupon_by_code($_GET['coupon_code']) != False){
        if(Coupon::get_coupon_by_code($_GET['coupon_code'])['is_redeemed'] == 'not_used'){
            Coupon::redeem_coupon($_GET['coupon_code']);
            Action::create_action('', "User - ".$_SESSION['user_id']." redeemed coupon Coupon ID - ".$_GET['coupon_code'], 'redeem_coupon', getdate()[0]);
            Balance::update_balance($_SESSION['user_id'], intval(Balance::get_user_balance($_SESSION['user_id'])['amount']) + intval(Coupon::get_coupon_by_code($_GET['coupon_code'])['value']  ));
            header('Location: claim_coupon.php?claim_success=set');
            exit();
        }else{
            header('Location: claim_coupon.php?claim_error=set');
            exit();
        }
    }
    else{

        header('Location: claim_coupon.php?coupon_error=set');
        exit();
    }
    // TODO create seats as well
}