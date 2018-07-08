<?php
include_once('../../session.php');

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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../../css/carousel.css" rel="stylesheet">
    <style>
.navbar-nav >a,.navbar-brand{
        height: 12px !important;
    }
    .navbar{min-height: 12px!important;}
    .tm-black-bg{
      clear: both;
      float: none;     
      position: relative;
      top:330px;
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
                        <a href="../../index.php"><img style="max-width:150px; margin-top:-20px; " src="../../images/bus.png"></a></h2>
                
                        <?php
                            if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){
                                echo '<li class="active"><a href="../../index.php">Home</a></li>';
                            }
                            else{
                                echo '<li class="active"><a href="../../index.php">Home</a></li>';
                            }
                        ?>

                        <li><a href="../journey/index.php">Journeys</a></li>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="../reservation/index.php">Reservations</a></li>';
                            echo '<li><a href="claim_coupon.php">Claim Coupon</a></li>';
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
        <div class="col-lg-7">
            <h1>Coupon</h1>
            <form method="get" role="form" action="coupon_controller.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Coupon Code</label>
                    <input name="coupon_code" type="text" class="form-control" placeholder="Enter Coupon Code" required>
                </div>

                <button type="submit" class="btn btn-primary">Claim</button>
                <input type="hidden" name="type" value="claim">
            </form>
        </div>
        <?php
        echo '<div class="col-lg-5">';
        if(isset($_GET['coupon_error'])){
            echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Coupon does not exist.
                        </div>';
        }
        if(isset($_GET['claim_error'])){
            echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Coupon has been already claimed.
                        </div>';
        }

        if(isset($_GET['claim_success'])){
            echo '<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        You have claimed the Coupon.
                        </div>';
        }
        echo '</div>';
        ?>
    </div>

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER --> 
      <footer class="tm-black-bg">
        <div class="container">
             
                <p class="tm-copyright-text">Copyright &copy; 2017 EthioBus 
                
                </p>
           
        </div>      
    </footer>


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
