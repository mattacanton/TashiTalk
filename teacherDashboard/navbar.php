<?php
	//======================================================================
	// author-Matthew Canton
	// Apr 26 2016
	//
	// navbar.php
	// navbar shared by all pages in teacher dashboard
	// expected input: image and css resources
	// possible output: give user referneces to other pages
	//======================================================================
?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../index.php"><img width="39" height="39" style="max-width:100px; margin-top: -10px;" src="./resources/images/logoSmall.png"></a>
	    </div>
	    <div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				
				<!-- Active tab code -->
				<li role="presentation" class="active"><a href="#">Messages <span class="badge">8</span></a></li>
				<!--  <li class="active"> -->
				<li><a href='index.php'>Back to Dashboard</a></li>
				<li><a href='classStart.php'>Create a Class</a></li>
				<li><a href='teacherprompt.php'>Create Assignment</a></li>
				<li><a href="gradeselect.php">Grade Assignments</a></li>
              
				<!--Dropdown-->
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Settings</a></li>
					<li><a href="../contactLoggedOut">Feedback</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="logOut.php">Log out</a></li>
				  </ul>   
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>