<?php
    // get the data from the form
    $grade = filter_input(INPUT_POST, 'grade');

	require_once('mysqli_connect.php');
	
	
	$query2 = 'UPDATE Submissions SET grade = ? WHERE sub_id=?';
	$stmt2 = mysqli_prepare($dbc, $query2);
	mysqli_stmt_bind_param($stmt2,"si",$option,$row['sub_id']);
	mysqli_stmt_execute($stmt2);
	mysqli_stmt_close($stmt2);
	
	include('gradeselect.php');
?>