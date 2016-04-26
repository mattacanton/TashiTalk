<?php
session_start();
require_once('mysqli_connect.php');

// pull the raw binary data from the POST array
$data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);
// decode it
$decodedData = base64_decode($data);


$pathname = "./../submissions/students/JPN_101/".$_SESSION['assignment_id'].'/'.$_SESSION['assignment_id'];

if (!is_dir($pathname))
{
    mkdir($pathname, 0777, true);
}

$filename = $pathname . "/video.webm";
// echo $filename;
// write the data out to the file
$fp = fopen($filename, 'wb');
fwrite($fp, $decodedData);
fclose($fp);

$user_number= (int)$_SESSION["user_number"];
$class_id=(int)$_SESSION["class_id"];
$teacher_id=(int)$_SESSION["teacher_id"];


//Write whats needed to database
 $query = 'INSERT INTO Submissions
                 (userNumber, class_id, teacher_id, subattempt_loc)
              VALUES
                 (?,?,?,?)';
    $stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt,"iiis", $user_number, $class_id, $teacher_id, $filename);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
if(true){
header("location:./submitted.php");
}
?>