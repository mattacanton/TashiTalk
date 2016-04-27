<?php
	//======================================================================
	// author-Matthew Canton
	// Apr 26 2016
	//
	// teacherprompt_display.php
	// displays information input sent to database from teacherprompt.php
	// expected input: Information to Create a Prompt from teacherPrompt.php
	// possible output: info sent to database, and repeated back to user
	//======================================================================

    // get the data from the form
	$teacher_id = filter_input(INPUT_POST, 'teacher_id',FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id',FILTER_VALIDATE_INT);
	$prompt_name = filter_input(INPUT_POST, 'prompt_name');
    $prompt_text = filter_input(INPUT_POST, 'prompt_text');

	//Validate Inputs
	if ($teacher_id === null || $teacher_id === false ||
			$class_id === null ||$class_id === null|| $prompt_name === null || $prompt_text === null ) {
		$error = "<h1>Invalid prompt entries. Check all fields and try again.</h1>";
		include('teacherPrompt.php');
		echo $error;
	} else {
		require_once('mysqliConnect.php');
		
		$target_dir = "./../uploadedMaterial/teachers/JPN_101/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				// Add the assignment to the database  
				$query = 'INSERT INTO Assignments
							 (teacher_id, class_id, prompt_loc, prompt_name, prompt_text)
						  VALUES
							 (?,?,?,?,?)';
				$stmt = mysqli_prepare($dbc, $query);
				mysqli_stmt_bind_param($stmt,"iisss",$teacher_id, $class_id, $target_file, $prompt_name, $prompt_text);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
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
			<label>Teacher ID:</label>
			<span><?php echo $teacher_id; ?></span><br>
			<label>Class ID:</label>
			<span><?php echo $class_id; ?></span><br>

			<label>Prompt Title:</label>
			<span><?php echo $prompt_name; ?></span><br>

			<label>Prompt Description:</label>
			<span><?php echo $prompt_text; ?></span><br>
			
			<!--     <script src="script.js"></script> -->
			<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
			<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		  </body>
		</html>
	<?php 	
} ?>