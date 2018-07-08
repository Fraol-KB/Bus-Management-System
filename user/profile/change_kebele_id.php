<?php
include_once('../../session.php');
include_once('../../models/db.php');
include_once('../../models/User.php');
include_once('../../models/Balance.php');
include_once('../../models/Reservation.php');
include_once('../../models/Journey.php');

include_once ('../../models/Bus.php');
include_once ('../../models/Route.php');
include_once ('../../models/Origin.php');
include_once ('../../models/Destination.php');
include_once ('../../models/Seat.php');
include_once ('../../models/Action.php');

function show_route($id){
    return Origin::get_origin_by_id(Route::get_route_by_id($id)['origin_id'])['name'].
    " - ".
    Destination::get_destination_by_id(Route::get_route_by_id($id)['destination_id'])['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Bus System</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../../css/carousel.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bus System</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <?php
                        if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){
                            echo '<li><a href="../../user_profile.php">Home</a></li>';
                        }
                        else{
                            echo '<li><a href="../../index.php">Home</a></li>';
                        }
                        ?>
                        <li><a href="../../user/journey/index.php">Journeys</a></li>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="../../user/reservation/index.php">Reservations</a></li>';
                            echo '<li><a href="../../user/coupon/claim_coupon.php">Claim Coupon</a></li>';
                        }?>
                        <li><a href="../../information_list.php">Information</a></li>
                        <li><a href="../../about_us.php">About Us</a></li>
                        <li><a href="../../contact_us.php">Contact Us</a></li>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="../../index.php?logout=yes">Logout</a></li>';
                        } elseif(isset($_SESSION['user_id'])){
                            echo '<li><a href="../../index.php?logout=yes">Logout</a></li>';
                        } else {
                            echo '<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login | Register<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../../user_login.php">User Login</a></li>
                                <li><a href="../../user_register.php">User Register</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../admin_login.php">Admin Login</a></li>
                            </ul>
                        </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-lg-12">

            <div class="panel panel-default">

                <!-- /.panel-heading -->

                    <div class="table-responsive">
                        <?php
                        if(isset($_GET['change_success'])){
                            echo '<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Kebele ID Changed!
                        </div>';
                        }
                        echo '</div>';
                        ?>

                    </div>
                    <br>
                    <div class="row">
                        <div class="panel-heading">
                            Change Kebele ID
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="get" role="form" action="profile_controller.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>New Kebele ID</label>
                                            <input name="new_kebele_id" type="text" class="form-control" placeholder="Enter New Kebele ID" required>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="hidden" name="type" value="change_kebele_id">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->

            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>
        <p>&copy; 2016 Bus System</p>
    </footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../js/jquery.min.js"><\/script>')</script>
<script src="../../js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../js/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
