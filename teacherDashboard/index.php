<?php
//======================================================================
// author-Matthew Canton
//======================================================================

//-----------------------------------------------------
// teacher dashboard
// connects to all aspects for teacher functions
//-----------------------------------------------------

/* index.php */

/*
* connects to teacherprompt.php
* connects to classStart.php
* connects to gradeselect.php
*/
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
      
<!--      Assignment display-->
<div class="container" >
  
  <div class="text-center" >
    <!--
    <p class="lead">assignments (shown only if their are any): <br></p>
        <ul class="list-group">
          <a href="#" class="list-group-item">Turn in 3 live chat recordings</a>
          <a href="#" class="list-group-item">Record responses to this prompt set</a>
        </ul>-->
  </div>
  
    <hr>
  
</div><!-- /.container -->


<!--      Main Page Options-->
 <section class="wrapper" align="center">
	<div class="container" >
      <!-- Three columns of text -->
      <div class="row">
		<!-- Create a class column-->
		<div class="col-lg-4">
			<a href="classStart.php" >
				<img class="img-circle" src="resources/images/add.png" alt="Generic placeholder image" width="140" height="140">
			</a>
		  <h2>Start a Class</h2>
          <p>Start a class for students to join!</p>
          <p><a class="btn btn-default" href="classStart.php" role="button">View details &raquo;</a></p>
        </div><!-- Create Assignment column-->
        <div class="col-lg-4">
			<a href="teacherprompt.php">
				<img class="img-circle" src="resources/images/paper.jpg" alt="Generic placeholder image" width="140" height="140">
			</a>
		  <h2>Create an Assignment</h2>
          <p>Here you can create an assignment for a specific class.</p>
          <p><a class="btn btn-default" href="teacherPrompt.php" role="button">View details &raquo;</a></p>
        </div><!-- Grade Assignments Column -->
        <div class="col-lg-4">
			<a href="gradeselect.php">
				<img class="img-circle" src="resources/images/check.png" alt="Generic placeholder image" width="140" height="140">
			</a>
          <h2>Grade Assignments</h2>
          <p>Want to grade some of your assignments? <br>Go here!
          <p><a class="btn btn-default" href="gradeselect.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	</div>
</section>
	<!-- Scripts -->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>