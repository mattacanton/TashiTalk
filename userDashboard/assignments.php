<!-- //======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// assignment.php
// 
// expected input: mouse clicks
// possible output: redirection to assignment view page with relevant data for specific assignment retrieval 
//====================================================================== -->

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
  </head>
  <body>

  	<!-- Nav bar -->
    <?php include 'navbar.php' ?>

      
<!--      Assignment display-->
<div class="container" >
  </br>
  </br>
  </br>
  <div class="text-center" style="font-family: 'Montserrat', sans-serif;" >

      <!-- descriptive text print -->
    <p class="lead" style="font-size:200%;">Prompts:<br></p>
        <!-- Print the assignments in a list -->
        <ul class="list-group">
        <?php
          $query = 'SELECT * FROM Assignments';
          $result = mysqli_query($dbc, $query);
            //For each assignment make a list entry
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
  
</div><!-- /.container -->



	<!-- Scripts -->

<script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>