<!DOCTYPE html>
<?php include ('../userSystem/userBase.php');
  require_once('mysqli_connect.php'); ?>
<?php include ('../siteWideResources/userCheck.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TashiTalk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="../siteWideResources/jqery-2.2.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="resources/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

<!--     <script src="script.js"></script> -->
  </head>
  <body>

  	<!-- Nav bar -->
    <?php include 'navbar.php' ?>

      
<!--      Assignment display-->
<div class="container" >
  
  <div class="text-center" style="font-family: 'Montserrat', sans-serif;" >
    <h1 style="font-size:375%;" >Hello <?php echo $_SESSION["first_name"] ?>!</h1>
    </br>

    <p class="lead">Assignments:<br></p>
        <ul class="list-group">
        <?php
          $query = 'SELECT * FROM Assignments';
          $result = mysqli_query($dbc, $query);

           while ($row=mysqli_fetch_assoc($result)) { 
              $assignment_id=$row['assign_id'];
              $assignmnet_name=$row['prompt_name'];
              $teacher_id=$row['teacher_id'];
              $class_id=$row['class_id'];
              echo '<a style="font-size:125%;" href="./viewPrompt.php?assignment_id='.$assignment_id.'&teacher_id='.$teacher_id.'&class_id='.$class_id.'" class="list-group-item">'.$assignmnet_name.'</a>';
           }

          ?>
        </ul>
  </div>
    <hr>
  
</div><!-- /.container -->


<!--      Main Site Options-->
<div class="container">
	<div class="row">
	    <div class="col-sm-4">
	    	<div class="well switchboard" style="font-family: 'Montserrat', sans-serif;font-size:25px;">Chat with Partners
        </br>
        <a href="./talk.php"> <i class="fa fa-comments" style="font-size: 270px;color: rgb(51,51,51);" aria-hidden="true"></i></a>  
        </div>
	    </div>
	    <div class="col-sm-4">
	    	<div class="well switchboard" style="font-family: 'Montserrat', sans-serif;font-size:25px;">Lessons
         </br>
         <a href="#"> <i class="fa fa-book" style="font-size: 270px;color: rgb(51,51,51);" aria-hidden="true"></i></a>  
        </div>
	    </div>
	    <div class="col-sm-4">
	    	<div class="well switchboard" style="font-family: 'Montserrat', sans-serif;font-size:25px;">Practice with Prompts
         </br>
        <a href="./assignments.php"> <i class="fa fa-language" style="font-size: 270px;color: rgb(51,51,51);" aria-hidden="true"></i></a>  
        </div>
	    </div>
	</div>
</div>


	<!-- Scripts -->

<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>