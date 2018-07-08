<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once('user_controller.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Home Page</title>

    <!--    CSS STUFF-->
    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Bus System
            </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="../change_password.php"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../session_controller.php?logout=yes"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="../index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="../driver/index.php"><i class="fa fa-user fa-2x"></i> Drivers</a>
                    </li>
                    <li>
                        <a href="../bus/index.php"><i class="fa fa-automobile fa-2x"></i> Buses</a>
                    </li>
                    <li>
                        <a href="../origin/index.php"><i class="fa fa-location-arrow fa-2x"></i> Origins</a>
                    </li>
                    <li>
                        <a href="../destination/index.php"><i class="fa fa-anchor fa-2x"></i> Destinations</a>
                    </li>
                    <li>
                        <a  href="../route/index.php"><i class="fa fa-road fa-2x"></i> Routes</a>
                    </li>
                    <li>
                        <a href="../journey/index.php"><i class="fa fa-plane fa-2x"></i> Journeys</a>
                    </li>
                    <li>
                        <a class="alert-danger" href="index.php"><i class="fa fa-users fa-2x"></i> Users</a>
                    </li>
                    <li>
                        <a href="../coupon/index.php"><i class="fa fa-credit-card fa-2x"></i> Coupons</a>
                    </li>
                    <li>
                        <a href="../information/index.php"><i class="fa fa-info fa-2x"></i> Information</a>
                    </li>
                    <li>
                        <a href="../comment/index.php"><i class="fa fa-comments-o fa-2x"></i> Comments</a>
                    </li>
                    <li>
                        <a href="../report/index.php"><i class="fa fa-bar-chart-o fa-2x"></i> Reports</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="get" role="form" action="user_controller.php" enctype="multipart/form-data">
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../../js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../../js/sb-admin-2.js"></script>

</body>

</html>
