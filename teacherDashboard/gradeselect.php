 <!DOCTYPE html>
<html lang="en">

 <?php 
	require_once('mysqli_connect.php');
	
	$query = 'SELECT * FROM studentgrade';
	$result = mysqli_query($dbc, $query);
	if (!isset($grade)) { $grade = ''; } 
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
<div class="container">
<table class="table table-striped" >
	<tr>
		<th>Submission Id</th>
		<th>Submitted Recording</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Class Name</th>
		<th>Class Id</th>
		<th>Assignment Grade</th>
	</tr>
	
	
	<tr><?php while ($row=mysqli_fetch_assoc($result)) { 
		?>
			<?php echo '<td>'.$row['sub_id'].'</td>'; ?>
			<td><video muted width="320" height="240" controls src="<?php echo $row['subattempt_loc']; ?>" alt="Attempt 1"></video></td>
		   <?php echo '<td>'.$row['first_name'].'</td>'; ?>
		   <?php echo '<td>'.$row['last_name'].'</td>'; ?>
		   <?php echo '<td>'.$row['class_name'].'</td>'; ?>
		   <?php echo '<td>'.$row['class_id'].'</td>'; ?>
		    <td><form action='#' method="post">
			<select name="grade">
				<option name="A" value="$grade">A</option>
				<option name="A-" value="$grade">A-</option>
				<option name="B+" value="B+">B+</option>
				<option name="B" value="B">B</option>
				<option name="B-" value="B-">B-</option>
				<option name="C+" value="C+">C+</option>
				<option name="C" value="C">C</option>
				<option name="C-" value="C-">C-</option>
				<option name="D+" value="D+">D+</option>
				<option name="D" value="D">D</option>
				<option name="D-" value="D-">D-</option>
				<option name="F" value="F">F</option>
			</select>
			<input type="submit" name="submit" value="Submit"></td>
	</tr>
	<?php }
	;?>    
</table>  
</div>