<?php
include_once('../../session.php');
include_once('journey_controller.php');


if(!isset($_SESSION['user_id'])){
    header(' Location: ../../index.php');
    exit();
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
    <link href="../../css/seat_booking.css" rel="stylesheet">

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
        <div class="table-responsive">
            <?php
            if(isset($_GET['balance_error'])){echo "
                    <div class='col-lg-8'>
                    <div class='row'>

                        <div class='alert alert-info'>
                            You don't have enough balance for all selected seats.
                        </div>
                    </div>
                    </div>
                    ";}?>

        </div>
        <div class="table-responsive">
            <?php
            if(isset($_GET['seat_error'])){echo "
                    <div class='col-lg-8'>
                    <div class='row'>

                        <div class='alert alert-danger'>
                            No seat selected.
                        </div>
                    </div>
                    </div>
                    ";}?>

        </div>
    </div>
    <div class="row featurette">
        <div class="col-lg-7">
            <h1>Reserve Form</h1>
            <form method="get" role="form" action="journey_controller.php" enctype="multipart/form-data">
                 <?php
                        $journey = Journey::get_journey_by_id($_GET['journey_id']);
                        $bus = Bus::get_bus_by_id($journey['bus_id']);
                 ?>

                <div class="form-group">
                    <label>Bus</label>
                    <p class="form-control-static">Plate Number - <?php
                        echo Bus::get_bus_by_id($journey['bus_id'])['plate_number']?></p>
                </div>
                <div class="form-group">
                    <label>Bus</label>
                    <p class="form-control-static">Route - <?php
                        echo show_route(Bus::get_bus_by_id($journey['bus_id'])['route_id'])?></p>
                </div>

<!--                <div class="form-group">-->
<!--                    <label for="select_seat">Choose Seat</label>-->
<!--                    <select id='select_seat' class="form-control" name="seat_id">-->
<!--                        --><?php
//                        for($i=0; $i < count(Seat::get_all_unoccupied_seats_by_bus(Bus::get_bus_by_id($journey['bus_id'])['id'])); $i++){
//
//
//
//                            echo "<option value='".Seat::get_all_unoccupied_seats_by_bus($bus['id'])[$i]['id']."'>". Seat::get_all_unoccupied_seats_by_bus($bus['id'])[$i]['number']."</option>";
//
//                        }
//                        ?>
<!---->
<!---->
<!--                    </select>-->
<!--                </div>-->
                <div class="form-group row">
                    <div class="col-md-5">



                            <li >
                                <ol class="seats" >
                                    <?php
                                    for($i=0; $i < count(Seat::get_all_seats_by_bus(Bus::get_bus_by_id($journey['bus_id'])['id'])); $i++){

                                        echo '<li >';
                                        if(Seat::get_all_seats_by_bus($bus['id'])[$i]['occupied'] == 'occupied'){
                                        echo "<label class='checkbox-inline' for='". Seat::get_all_seats_by_bus($bus['id'])[$i]['number']."'>";
                                            echo "<input type='checkbox' name='seat_id[]' value='".Seat::get_all_seats_by_bus($bus['id'])[$i]['id']."' id='". Seat::get_all_seats_by_bus($bus['id'])[$i]['number']."' disabled/>";
                                        }else{

                                            echo "<input type='checkbox' name='seat_id[]' value='".Seat::get_all_seats_by_bus($bus['id'])[$i]['id']."' id='". Seat::get_all_seats_by_bus($bus['id'])[$i]['number']."' />";
                                        }
                                        //echo "<option value=''></option>";
                                        echo " ". Seat::get_all_seats_by_bus($bus['id'])[$i]['number']."</label>";
                                        echo '</li>';


                                    }
                                    ?>
                                </ol>
                            </li>
                    </div>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-primary">Reserve</button>
                </div>
                <input type="hidden" name="type" value="reserve">
                <input type="hidden" name="journey_id" value="<?php echo $_GET['journey_id']?>">
                <input type="hidden" name="bus_id" value="<?php echo $bus['id']?>">
            </form>
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
