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

<!--     <script src="script.js"></script> -->
  </head>
  <body>

  	<!-- Nav bar -->
    <?php include 'navbar.php' ?>

      
<!--      Assignment display-->
<div class="container" >
<div class="text-center" >
<i class="fa fa-envelope" style="font-size: 310px;" aria-hidden="true"></i>
</br>
<h1>Submitted</h1>
<a href="./index.php" class="btn btn-success">Continue</a>

</div>
</div>


	<!-- Scripts -->

<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>