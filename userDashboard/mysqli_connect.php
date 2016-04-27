<?php 
	//======================================================================
	// author-Matthew Canton
	// Apr 26 2016
	//
	// mysqliConnect.php
	// This file contains the database access information. 
	// It establishes a connection to MySQL and selects the database
	// expected input: n/a
	// possible output: information to connect to database
	//======================================================================

	// Set the database access information as constants:
	define('DBHOST', 'localhost');
	define('DBUSER', 'LanguageBounce');
	define('DBPASS', 'wPeb7qQ4YdEYZ34L9T7DnV');
	define('DBNAME', 'goga_database');

	// Make the connection:
	$dbc = mysqli_connect (DBHOST, DBUSER, DBPASS, DBNAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
?>