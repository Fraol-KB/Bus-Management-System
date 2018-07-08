<?php

if(isset($_SESSION['user_id'])){
    header(' Location: index.php');
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
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
                            echo '<li><a href="user_profile.php">Home</a></li>';
                        }
                        else{
                            echo '<li><a href="index.php">Home</a></li>';
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
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){

                            echo '<li><a href="index.php?logout=yes">Logout</a></li>';
                        } elseif(isset($_SESSION['user_id'])){
                            echo '<li><a href="index.php?logout=yes">Logout</a></li>';
                        } else {
                            echo '<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login | Register<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="user_login.php">User Login</a></li>
                                <li><a href="user_register.php">User Register</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="admin_login.php">Admin Login</a></li>
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
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
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <?php
                echo '<div class="col-lg-4">';
                if(isset($_GET['username_error'])){
                    echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Username is Taken. Please Choose Another.
                        </div>';
                }
                if(isset($_GET['password_error'])){
                    echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Password does not Match.
                        </div>';
                }

                echo '</div>';
                ?>



                <!-- /.col-lg-12 -->
            </div>
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
<script src="js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="js/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
