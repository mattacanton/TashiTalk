<?php
	//======================================================================
	// author-Matthew Canton
	// Apr 26 2016
	//
	// logOut.php
	// logs user out
	// expected input: action to destroy session
	// possible output: send user back to main homepage
	//======================================================================
	
	include ('../userSystem/userBase.php');
	//destroys session
	session_destroy();
	header("location: ../index.php");
?>