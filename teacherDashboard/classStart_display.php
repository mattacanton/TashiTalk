<?php
    // get the data from the form
	$class_id = filter_input(INPUT_POST, 'class_id',FILTER_VALIDATE_INT);
    $class_name = filter_input(INPUT_POST, 'class_name');
	

	//Validate Inputs
	if ($class_id === null || $class_id === false ||
			$class_name === null) {
		$error = "<h1>Invalid prompt entries. Check all fields and try again.</h1>";
		include('classStart.php');
		echo $error;
	} else {
		require_once('mysqli_connect.php');
	
	

	
	  // Add the customer to the database  
    $query = 'INSERT INTO Classes
                 (class_id, class_name)
              VALUES
                 (?,?)';
    $stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt,"is",$class_id, $class_name);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
?>
<!DOCTYPE html>
<html lang="en">
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

	<style> 
		label{padding-left: 2cm;}
		h3{padding-left: 2cm;}
	</style>
        
	<br><br><br>
	<h3> Here is your prompt info...</h3>
	<br>
	<label>Class ID:</label>
	<span><?php echo $class_id; ?></span><br>
	<label>Class Name:</label>
	<span><?php echo $class_name; ?></span><br>
	
	<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
	<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
  
</html>
	<?php } ?>
	