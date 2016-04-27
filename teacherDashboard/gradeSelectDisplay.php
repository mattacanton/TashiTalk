<?php

	require_once('mysqli_connect.php');
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$grade=$_POST['grade'];
		error_log($_POST['grade']);
		echo $grade;
		$query2 = 'UPDATE Submissions SET grade = ? WHERE sub_id=?';
		$stmt2 = mysqli_prepare($dbc, $query2);
		mysqli_stmt_bind_param($stmt2,"si",$grade,$row['sub_id']);
		mysqli_stmt_execute($stmt2);
		mysqli_stmt_close($stmt2);
	}
?>