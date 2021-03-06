
<!-- //======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// navbar.php
// Establishes a database connection.
// Expected use is to be included at the top of other pages.
// expected input: mouse clicks on buttons and dropowns
// possible output: change to relevant page
//====================================================================== -->

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
              
	      <!-- Redirect Buttons -->
            <li role="presentation" class="active"><a href="#">Messages <span class="badge">8</span></a></li>
	        <li><a href="./talk.php">Chat Partners</a></li>
	        <li><a href="#lessons">Lessons</a></li>
	        <li><a href="./assignments.php">Prompts</a></li>


              
<!--              Dropdown menu    -->
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