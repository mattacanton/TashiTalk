<!-- //======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// talk.php
// Load users into a live video chat room to talk.
// expected input: video webcam
// possible output: group video streams
//====================================================================== -->

<!DOCTYPE html>
<?php include ('../userSystem/userBase.php');
  require_once('mysqli_connect.php'); ?>
<?php include ('../siteWideResources/userCheck.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TashiTalk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="../siteWideResources/jqery-2.2.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="resources/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  </head>
  <body>

  	<!-- Nav bar -->
    <?php include 'navbar.php' ?>

      
<!--   Chat room   -->
<div class="container" >
<iframe src="https://appear.in/live-frolearnjapn" width="1200" height="500" frameborder="0"></iframe>
</div>


	<!-- Scripts -->

<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>