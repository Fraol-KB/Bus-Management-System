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
    <style type="text/css">

    .navbar-nav >a,.navbar-brand{
        height: 12px !important;
    }
    .navbar{min-height: 12px!important;}
   .tm-black-bg{
      clear: both;
      float: none;     
      position: relative;
      top:140px;
      width: auto;
      height: 40px;
      background-color: black;
    }
    .tm-copyright-text{

        font-size: 20px;
        text-align: center;

    }
    #pop1{
        position: relative;
        top: -100px;
 
    }


    .tm-about-box-1{

        height: 60px;

    }
    .new{
        position: relative!important;
        padding-top: 0px;
        margin-top: 0px;

    }
 .new1{
        position: relative!important;
        top: -60px!important;
        width: auto;
        height: 60px;
        background-color:#212121;
        opacity:0.9;
    }
    .tm-banner-title{

        position: relative!important;
        left: 40px!important;

    }
    .tm-banner-link{
         position: relative!important;
        left: 560px!important;
        top: 110px;
    }
  
.social{
    height: 40px;
    
}
.sn{
  font-size: 17.5px;
    
  position: relative;
  top:10px;
  background-color: transparent;
  overflow: hidden;
  border:none;
}
#mod2{
    margin-left: 10px;
    
}
    </style>



</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
            
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                                    </div>
                                        <div class="navbar-header">
               <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                             <h2 class="navbar-brand brand-name">
                        <a href="../../index.php"><img style="max-width:150px; margin-top:-20px; " src="../../images/bus.png"></a></h2>
                
                        <?php
                            if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){
                                echo '<li class="active"><a href="../../index.php">Home</a></li>';
                            }
                            else{
                                echo '<li class="active"><a href="../../index.php">Home</a></li>';
                            }
                        ?>

                        <li><a href="index.php">Journeys</a></li>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="../reservation/index.php">Reservations</a></li>';
                            echo '<li><a href="../coupon/claim_coupon.php">Claim Coupon</a></li>';
                        }?>
                        <li><a href="../../information_list.php">Information</a></li>
                        <li><a href="../../about_us.php">About Us</a></li>
                        <li><a href="../../contact_us.php">Contact Us</a></li>
                        <li>  <?php if(!(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user')){
                            echo '<button type="button" id="mod1"class="sn" data-toggle="modal" data-target=
                             "#myModal">Login</button>';
 echo  '</li>';
      echo '<button type="button" id="mod2" class="sn" data-toggle="modal" data-target=
                             "#myModal1">Register</button>
  </li>';
      }?>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="../../index.php?logout=yes">Logout</a></li>';
                        } elseif(isset($_SESSION['user_id'])){
                            echo '<li><a href="../../index.php?logout=yes">Logout</a></li>';
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
                    <div class="row">
                        <div class="col-lg-7">
                            <form method="get" role="form" action="journey_controller.php" enctype="multipart/form-data">
                                <div class="form-inline form-group">

                                    <input name="search_term" type="text" class="form-control" placeholder="Search Here..." required>
                                    <button  type="submit" class="form-inline btn btn-info">Search</button>
                                </div>

                                <input type="hidden" name="type" value="search">
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
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
                        <tbody>

                        <?php

                        for($i=0; $i < count(Journey::get_all_journeys()); $i++){
                            echo "<tr>";

                            echo "<td>".Journey::get_all_journeys()[$i]['id']."</td>";
                            echo "<td>".Bus::get_bus_by_id(Journey::get_all_journeys()[$i]['bus_id'])['plate_number']."</td>";
                            echo "<td>".show_route(Bus::get_bus_by_id(Journey::get_all_journeys()[$i]['bus_id'])['route_id'])."</td>";
                            echo "<td>".Journey::get_all_journeys()[$i]['starting_date']."</td>";
                            echo "<td>".Journey::get_all_journeys()[$i]['starting_time']."</td>";
                            echo "<td>".Journey::get_all_journeys()[$i]['arrival_time']."</td>";
                            echo "<td>".Driver::get_driver_by_id(Bus::get_bus_by_id(Journey::get_all_journeys()[$i]['bus_id'])['driver_id'])['name']."</td>";
                            echo "<td>".Journey::get_all_journeys()[$i]['price']."</td>";
                            if(isset($_SESSION['user_id'])){
                                if(Balance::get_user_balance($_SESSION['user_id'])['amount'] < Journey::get_all_journeys()[$i]['price']){

                                    echo "<td><a class='btn btn-success disabled' href='#'>Reserve Seat</a> </td><td><div class='alert alert-warning'>
                                You do not have enough balance to reserve a seat on this journey.Please <a href='../coupon/claim_coupon.php' class='alert-link'>Claim a Coupon</a>.
                            </div></td> ";
                                }else{
                                    if(count(Seat::get_all_occupied_seats_by_bus(Bus::get_bus_by_id(Journey::get_all_journeys()[$i]['bus_id'])['id'])) ==
                                    count(Seat::get_all_seats_by_bus(Bus::get_bus_by_id(Journey::get_all_journeys()[$i]['bus_id'])['id']))){

                                        echo "<td><a class='btn btn-success disabled' href='#'>Reserve Seat</a> </td><td><div class='alert alert-info'>
                                This Journey is full</a>.
                            </div></td> ";
                                    }else{

                                        echo "<td><a class='btn btn-success' href='reserve.php?&journey_id=".Journey::get_all_journeys()[$i]['id']."'>Reserve Seat</a></td>";
                                    }

                                }
                            }else{

                                echo "<td><a class='btn btn-success' data-toggle='modal' data-target='#myModal' >Reserve Seat</a></td>";
                            }

                            echo "</tr>";
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
 <footer class="tm-black-bg">
        <div class="container">
             
                <p class="tm-copyright-text">Copyright &copy; 2017 EthioBus 
                
                </p>
           
        </div>      
    </footer>
</div><!-- /.container -->
   <!--first modal-->
                         <div id="myModal" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                         <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login</h4>
                        </div>
                        <div class="modal-body">
                        <form enctype="multipart/form-data" method="get" action="../../index.php" role="form">
                            
                                                            <div class="form-group">
                                    <input class="form-controll" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <input type="hidden" name="login_type" value="user">
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                             
                        </form>
                        </div>
                        <div class="modal-footer">
               <div class="col-md-offset-4"><span><a href="forgot_password.php"><i class="fa fa-arrow"></i> Forgot Password?</a></span></div>
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
                           </div>

                          </div>
                          </div>

 <!--second modal-->

                             <div id="myModal1" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                         <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Register</h4>
                        </div>
                        <div class="modal-body">
                            <form method="get" role="form" action="../../register_controller.php" enctype="multipart/form-data">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input name="first_name" type="text" class="form-control" placeholder="Enter First Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kebele ID</label>
                                                <input name="kebele_id" type="text" class="form-control" placeholder="Enter Kebele ID" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="optionsRadiosInline1" value="Male" checked>Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="optionsRadiosInline2" value="Female">Female
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="username" type="text" class="form-control" placeholder="Enter Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" pattern=".{8,}" title="8 characters minimum" type="password" class="form-control" placeholder="Enter Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input name="confirm_password" pattern=".{8,}" title="8 characters minimum" type="password" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="email" class="form-control" placeholder="Enter Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input name="phone_number" pattern=".{10,}" title="10 characters minimum" type="tel" class="form-control" placeholder="Enter Phone Number" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <input type="hidden" name="type" value="add">
                                        </div>
                        </div>
                        <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
                           </div>

                          </div>
                          </div>


 <!-- /.container -->



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
