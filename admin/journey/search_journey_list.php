<?php

include_once('../../session.php');
include_once('../../login_controller.php');
confirm_login('../../index.php');
if(isset($_GET['logout'])){

    logout();
}

include_once('journey_controller.php');
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
                        <a href="../route/index.php"><i class="fa fa-road fa-2x"></i> Routes</a>
                    </li>
                    <li>
                        <a class="alert-danger"  href="index.php"><i class="fa fa-plane fa-2x"></i> Journeys</a>
                    </li>
                    <li>
                        <a href="../user/index.php"><i class="fa fa-users fa-2x"></i> Users</a>
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
                    <h1 class="page-header">Journey</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Journey List
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <a class="btn btn-primary" href="add_journey.php">Add Journey</a>
                                </div>
                                <div class="table-responsive">
                                        <?php
                                    if(!isset($_SESSION['search_list']) ){
                                        echo "<div class='col-lg-8'>
                                                    <div class='row'>

                                                <div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                No Journeys found matching your search criteria.
                                                </div>
                                            </div>
                                        </div>
                                     ";
                                    }

                                    else {
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
                                        for ($i = 0; $i < count($journey_list); $i++) {
                                            echo "<tr>";

                                            echo "<td>" . $journey_list[$i]['id'] . "</td>";
                                            echo "<td>" . Bus::get_bus_by_id($journey_list[$i]['bus_id'])['plate_number'] . "</td>";
                                            echo "<td>" . show_route(Bus::get_bus_by_id($journey_list[$i]['bus_id'])['route_id']) . "</td>";
                                            echo "<td>" . $journey_list[$i]['starting_date'] . "</td>";
                                            echo "<td>" . $journey_list[$i]['starting_time'] . "</td>";
                                            echo "<td>" . $journey_list[$i]['arrival_time'] . "</td>";
                                            echo "<td>" . Driver::get_driver_by_id(Bus::get_bus_by_id($journey_list[$i]['bus_id'])['driver_id'])['name'] . "</td>";
                                            echo "<td>" . $journey_list[$i]['price'] . "</td>";

                                            echo "<td><a class='btn btn-danger' data-toggle='modal' data-target='#myModal" . $i . "' >Delete Journey</a></td>";

                                            echo "<div class='modal fade' id='myModal" . $i . "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>Alert!</h4>
      </div>
      <div class='modal-body'>
        Are you sure?
      </div>
      <div class='modal-footer'>
        <a href='journey_controller.php?type=delete&journey_id=" . $journey_list[$i]['id'] . "'>Yes</a>
        <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
      </div>
    </div>
  </div>
</div>";
                                            echo "</tr>";
                                        }
                                    }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
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
