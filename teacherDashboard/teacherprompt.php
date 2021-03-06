 <?php
//======================================================================
// author-Matthew Canton
// Apr 26 2016
//
// teacherPrompt.php
// prompts user to enter information for entry to database
// connects to index.php in teacherDashboard
// expected input: Information to Create a Prompt
// possible output: Information to Create a Prompt sent to teacherPromptDisplay.php
//======================================================================
?>
<!DOCTYPE html>
<html lang="en">
	<?php # index.php
		require_once('mysqliConnect.php');
	?>
	<head>	 <!--     <script src="script.js"></script> -->
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
		<?php 
			//set default value of variables for initial page load
			if (!isset($teacher_id)) { $teacher_id = ''; } 
			if (!isset($class_id)) { $class_id = ''; } 
			if (!isset($prompt_name)) { $prompt_name = ''; } 
			if (!isset($prompt_text)) { $prompt_text = ''; }
		?> 
			<style> 
				label{padding-left: 2cm;}
				h3{padding-left: 2cm;}
				textarea{margin-left: 200px;}
			</style>
			<br>
			<br>
			<h3>Please Enter Information to Create a Prompt</h3><br>
			<!-- 	
					author: Matthew Canton
					Apr 26 2016
					used once teacherPrompt.php is opened
					expected input: user input for prompt
					possible ouput: information for prompt sent to teacherPromptDisplay
			--> 
			<form action="teacherPromptDisplay.php" method="post" padding-left: 2cm; enctype="multipart/form-data">
				<div id="prompt_form">
				
					<label>Your Teacher ID:</label>
					<input type="text" name="teacher_id" value="<?php echo htmlspecialchars($teacher_id); ?>"><br>
					
					<label>Appropriate Class ID:</label>
					<input type="text" name="class_id" value="<?php echo htmlspecialchars($class_id); ?>"><br>
					
					<label>Prompt Title:</label>
					<input type="text" name="prompt_name" value="<?php echo htmlspecialchars($prompt_name); ?>"><br>
					
					<label>Prompt Description:</label><br>
					<textarea name="prompt_text" rows="5" cols="40"><?php echo htmlspecialchars($prompt_text);?></textarea><br>

					<!-- Prompts user to add file -->
					Select image to upload:
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input style="margin-left:100px" type="submit" name="submit" value="Submit"><br>
				</div>
			</form>
		
		<!-- Scripts -->
		<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
		<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>