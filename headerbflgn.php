<?php
include_once('session.php');
include_once('login_controller.php');
check_login_account();
//include_once('login_controller.php');

//if(isset($_SESSION['user_type'])){
//    if($_SESSION['user_type'] == 'admin'){
//        header(" Location : admin/index.php");
//        exit();
//    }
//
//}
if(isset($_GET['logout'])){

    logout();
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
 

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

     <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
  <link href="css/flexslider.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
       <style type="text/css">

    .navbar-nav >a,.navbar-brand{
        height: 12px !important;
    }
    .navbar{min-height: 12px!important;}
    .tm-black-bg{
      clear: both;
      float: none;     
      position: relative;
      top:120px;
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
                        <a href="index.php"><img style="max-width:150px; margin-top:-10px; " src="images/bus.png"></a></h2>
                
                        <?php
                            if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){
                                echo '<li class="active"><a href="user_profile.php">Home</a></li>';
                            }
                            else{
                                echo '<li class="active"><a href="index.php">Home</a></li>';
                            }
                        ?>

                        <li><a href="user/journey/index.php">Journeys</a></li>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="user/reservation/index.php">Reservations</a></li>';
                            echo '<li><a href="user/coupon/claim_coupon.php">Claim Coupon</a></li>';
                        }?>
                        <li><a href="information_list.php">Information</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="contact_us.php">Contact Us</a></li>
                        <li>
  <?php if(!(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user')){
                            echo '<button type="button" id="mod1"class="sn" data-toggle="modal" data-target=
                             "#myModal">Login</button>';
 echo  '</li>';
      echo '<button type="button" id="mod2" class="sn" data-toggle="modal" data-target=
                             "#myModal1">Register</button>
  </li>';
      }?>

                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="index.php?logout=yes">Logout</a></li>';
                        } elseif(isset($_SESSION['user_id'])){
                            echo '<li><a href="index.php?logout=yes">Logout</a></li>';
                        }  
                        ?>


                    </ul>
                </div>
            </div>
        </nav>


    </div>

</div>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="images/b1.jpg" alt="First slide">
            <div class="container">
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="images/bus2.jpg" alt="Second slide">
            <div class="container">
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="images/bus3.jpg" alt="Third slide">
            <div class="container">
            </div>
        </div>
        <div class="item">
            <img class="forth-slide" src="images/bus44.jpg" alt="forth slide">
            <div class="container">
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      
        <img class="glyphicon glyphicon-chevron-left" style="height:80px;   width:80px"   src="images/leftbtn.png"/>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
         <img class="glyphicon glyphicon-chevron-right" style="height:80px;   width:80px" src="images/rightbtn.png"/>
        <span class="sr-only">Next</span>
    </a>

</div><!-- /.carousel -->
   

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
   <div class="new">
   <div class="new1">
   
                </div>
   
</div> 
     <!--Login modal-->
                         <div id="myModal" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">

                         <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login</h4>
                        </div>
                        <div class="modal-body">

                        <form enctype="multipart/form-data" method="get" action="index.php" role="form">
                            
                                                            <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required>
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
                            <form method="get" role="form" action="register_controller.php" enctype="multipart/form-data">
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
<script src="js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="js/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
$('.carousel').carousel().next();

</script>
</body>
</html>
