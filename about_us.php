<?php
include_once('session.php'); 
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

    <style type="text/css">
    #content{
        position: relative;
        top:-200px;
    }

    .tm-black-bg{
        position: relative!important;
        bottom: -100px!important;

    }</style>
</head>
<!-- NAVBAR
================================================== -->

 
<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<header>
    <?php
     
    include_once('headerbflgn.php');
    ?>
</header>
<body>
<div id="content" class="container marketing">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">

        <div class="col-md-7">

            <p><h2 id="content1" class="featurette-heading">EthioBus Transport Agency </h2></p>
            <p class="lead"> We deliver a faster and effecient service.</p>
            <p class="lead"> Features a reservation system</p>
            <p class="lead"> Features a coupon system</p>
            <p class="lead"> Features a reward system</p>
            <br><br>
            <br><br>
            <br><br>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive center-block" src="images/about_bus.jpg" alt="Generic placeholder image">
        </div>
    </div>
</body>
    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>
    <?php
 
include_once('footerblgn.php');
?>
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
