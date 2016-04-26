 <!DOCTYPE html>
<html lang="en">

 <?php # index.php
	require_once('mysqli_connect.php');
	?>
	 <head>
    <meta charset="utf-8">
    <title>TashiTalk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="../siteWideResources/jqery-2.2.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="resources/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--     <script src="script.js"></script> -->
  </head>
  <body>

 	<!-- Nav bar -->
	<?php include 'navbar.php' ?>
<br>
<br>


<?php 
    //set default value of variables for initial page load
    if (!isset($class_id)) { $class_id = ''; } 
	if (!isset($class_name)) { $class_name = ''; } 
?> 
	<style> 
		label{padding-left: 2cm;}
		h3{padding-left: 2cm;}
		textarea{margin-left: 200px;}
	</style>
	<br>
	<br>
	<body>
		 <h3>Please Enter Information Create a class</h3><br>
		 
		<form action="classStart_display.php" method="post" padding-left: 2cm;>
			<div id="prompt_form">
			
			<label>Class ID:</label>
			<input type="text" name="class_id" value="<?php echo htmlspecialchars($class_id); ?>"><br>
			
			<label>Class Name:</label>
			<input type="text" name="class_name" value="<?php echo htmlspecialchars($class_name); ?>"><br>
			
			<input style="margin-left:100px" type="submit" value="Submit"><br>
		</form>
    
	<!-- Scripts -->

	<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
	<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>