<?php
include_once('session.php');
include_once('models/db.php');
include_once('models/Information.php');
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template --><style type="text/css">

    .navbar-nav >a,.navbar-brand{
        height: 12px !important;
    }
    .navbar{min-height: 12px!important;}
    .tm-black-bg{
      clear: both;
      float: none;     
      position: relative;
      top:120px;
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


#route{
position: relative;
left:200px;
font-family: sans-serif;
font-size: 60px;

    
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
                        <a href="index.php"><img style="max-width:150px; margin-top:-20px; " src="images/bus.png"></a></h2>
                
                        <?php
                            if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){
                                echo '<li class="active"><a href=" index.php">Home</a></li>';
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


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-lg-12">
            <h1 class="page-header" id="route">Information Board</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Information List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php

                            for($i=0; $i < count(Information::get_all_informations()); $i++){

                                echo "<div class='panel panel-default'>";
                                echo "<div class='panel-heading'>";
                                echo " ".Information::get_all_informations()[$i]['title']." ";
                                echo "</div>";
                                echo"<div class='panel-body'>";
                                echo " ".Information::get_all_informations()[$i]['description']." ";
                                $img=Information::get_all_informations()[$i]['img'];
                                if ($img!=null) {
                                      echo "<img class=\"thumbnail\" style=\"width:60%; float:right;\" src=\"upload/".$img."\" />";
                                 }
                                echo "</div>";
                                echo "</div>";
                            }

                            ?>
                        </div>

                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
   <footer class="tm-black-bg">
        <div class="container">
             
                <p class="tm-copyright-text">Copyright &copy; 2018 EthioBus 
                
                </p>
           
        </div>      
    </footer>
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
</body>
</html>
