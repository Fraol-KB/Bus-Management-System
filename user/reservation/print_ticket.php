<?php
include_once('../../session.php');
include_once('reservation_controller.php');

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
                        <li ><a href="../journey/index.php">Journeys</a></li>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li class="active"><a href="index.php">Reservations</a></li>';
                            echo '<li><a href="../coupon/claim_coupon.php">Claim Coupon</a></li>';
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
    <?php $reservation =  Reservation::get_reservation_by_id($_GET['reservation_id'])?>
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-lg-3">
            <a class='btn btn-primary' onclick="window.print()" >Print Ticket</a>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <h1 class="page-header">Ticket</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo "Ticket ID - ".$reservation['id']; ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kebele ID</th>
                                            <th>Bus Plate</th>
                                            <th>Route</th>
                                            <th>Starting Date</th>
                                            <th>Starting Time</th>
                                            <th>Arrival Time</th>
                                            <th>Driver</th>
                                            <th>Seat</th>

                                        </tr>
                                        <tr>
                                            <?php

                                            $journey = Journey::get_journey_by_id($reservation['journey_id']);
                                            $seat = Seat::get_seat_by_id($reservation['seat_id']);


                                            echo "<td>".$reservation['id']."</td>";
                                            echo "<td>".User::get_user_by_id($_SESSION['user_id'])['kebele_id_number']."</td>";
                                            echo "<td>".Bus::get_bus_by_id($journey['bus_id'])['plate_number']."</td>";
                                            echo "<td>".show_route(Bus::get_bus_by_id($journey['bus_id'])['route_id'])."</td>";
                                            echo "<td>".$journey['starting_date']."</td>";
                                            echo "<td>".$journey['starting_time']."</td>";
                                            echo "<td>".$journey['arrival_time']."</td>";
                                            echo "<td>".Driver::get_driver_by_id(Bus::get_bus_by_id($journey['bus_id'])['driver_id'])['name']."</td>";
                                            echo "<td>".$seat['number']."</td>";
                                            ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                            </div>

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
            <!-- /.panel-body -->
        </div>

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
