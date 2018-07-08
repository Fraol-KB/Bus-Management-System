<?php
include_once('../../session.php');
include_once('journey_controller.php');

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
                        <li class="active"><a href="index.php">Journeys</a></li>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="../../user/reservation/index.php">Reservations</a></li>';
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

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    if(isset($_SESSION['user_id'])){echo "
                    <div class='col-lg-8'>
                    <div class='row'>

                        <div class='alert alert-info'>
                            Your Balance is : ".Balance::get_user_balance($_SESSION['user_id'])['amount']."
                        </div>
                    </div>
                    </div>
                    ";}?>

                </div>
                <div class="table-responsive">
                    <?php
                    if(isset($_GET['reserve_success'])){echo "
                    <div class='col-lg-8'>
                    <div class='row'>

                        <div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        You have successfully reserved a seat.
                        </div>
                    </div>
                    </div>
                    ";}?>

                </div>
                <div class="table-responsive">
                    <?php
                    if(isset($_GET['reward'])){echo "
                    <div class='col-lg-8'>
                    <div class='row'>

                        <div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        You have been rewarded with 500 credit.
                        </div>
                    </div>
                    </div>
                    ";}?>

                </div>
                <div class="table-responsive">
                    <?php
                    if(!isset($_SESSION['search_list']) ){echo "
                    <div class='col-lg-8'>
                    <div class='row'>

                        <div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        No Journeys found matching your search criteria.
                        </div>
                    </div>
                    </div>
                    ";}

                    else{
                        echo '<table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bus Plate</th>
                            <th>Route</th>
                            <th>Starting Date</th>
                            <th>Starting Time</th>
                            <th>Arrival Time</th>
                            <th>Driver</th>
                            <th>Price</th>

                        </tr>
                        </thead>
                        <tbody>';
                        $journey_list = $_SESSION['search_list'];
                        for($i=0; $i < count($journey_list); $i++){
                            echo "<tr>";

                            echo "<td>".$journey_list[$i]['id']."</td>";
                            echo "<td>".Bus::get_bus_by_id($journey_list[$i]['bus_id'])['plate_number']."</td>";
                            echo "<td>".show_route(Bus::get_bus_by_id($journey_list[$i]['bus_id'])['route_id'])."</td>";
                            echo "<td>".$journey_list[$i]['starting_date']."</td>";
                            echo "<td>".$journey_list[$i]['starting_time']."</td>";
                            echo "<td>".$journey_list[$i]['arrival_time']."</td>";
                            echo "<td>".Driver::get_driver_by_id(Bus::get_bus_by_id($journey_list[$i]['bus_id'])['driver_id'])['name']."</td>";
                            echo "<td>".$journey_list[$i]['price']."</td>";
                            if(isset($_SESSION['user_id'])){
                                if(Balance::get_user_balance($_SESSION['user_id'])['amount'] < $journey_list[$i]['price']){

                                    echo "<td><a class='btn btn-success disabled' href='#'>Reserve Seat</a> </td><td><div class='alert alert-warning'>
                                You do not have enough balance to reserve a seat on this journey.Please <a href='../coupon/claim_coupon.php' class='alert-link'>Claim a Coupon</a>.
                            </div></td> ";
                                }else{
                                    if(count(Seat::get_all_occupied_seats_by_bus(Bus::get_bus_by_id($journey_list[$i]['bus_id'])['id'])) ==
                                        count(Seat::get_all_seats_by_bus(Bus::get_bus_by_id($journey_list[$i]['bus_id'])['id']))){

                                        echo "<td><a class='btn btn-success disabled' href='#'>Reserve Seat</a> </td><td><div class='alert alert-info'>
                                This Journey is full</a>.
                            </div></td> ";
                                    }else{

                                        echo "<td><a class='btn btn-success' href='reserve.php?&journey_id=".$journey_list[$i]['id']."'>Reserve Seat</a></td>";
                                    }

                                }
                            }else{

                                echo "<td><a class='btn btn-success' href='../../user_login.php'>Reserve Seat</a></td>";
                            }

                            echo "</tr>";
                        }

                        echo '</tbody>
                    </table>';

                    }

                    ?>





                </div>
                <!-- /.table-responsive -->
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
