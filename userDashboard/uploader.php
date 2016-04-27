<?php
//======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// uploader.php
// Recieves the data from viewprompt.php and re sequences it.
// Creates any required directories, saves to directory,
// adds database entry for submission.
// expected input: altered binary video recording
// possible output: video file to disk, new assignment row in database
//======================================================================
session_start();

//include database connection
require_once('mysqli_connect.php');

// pull the raw binary data from the POST array
$data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);
// resequence the video data into video file format
$decodedData = base64_decode($data);

//Get path name to save video to
$pathname = "./../submissions/students/JPN_101/".$_SESSION['assignment_id'].'/'.$_SESSION['assignment_id'];

// -----------------------------------------------
// Creates folders required and set permisions if they do not exist.
// -----------------------------------------------
if (!is_dir($pathname))
{
    mkdir($pathname, 0777, true);
}

$filename = $pathname . "/video.webm";

// write the data out to the file
$fp = fopen($filename, 'wb');
fwrite($fp, $decodedData);
fclose($fp);

//Get variables for database interaction
$user_number= (int)$_SESSION["user_number"];
$class_id=(int)$_SESSION["class_id"];
$teacher_id=(int)$_SESSION["teacher_id"];


//Creates a entry in the Submission table for the submission.
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