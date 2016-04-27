<?php
//======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// userBase.php
// Establishes a database connection.
// Expected use is to be included at the top of other pages.
// expected input: none
// possible output: create a $db variable with a database connection
//======================================================================
ob_start();
session_start();

//Database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'LanguageBounce');
define('DBPASS', 'wPeb7qQ4YdEYZ34L9T7DnV');
define('DBNAME', 'goga_database');

// -----------------------------------------------
// Tries to connect to the database and store the 
// connection in $db
// -----------------------------------------------
try{
	
	//Create database connection
	$db = new PDO('mysql:host='.DBHOST.';port=8889;dbname='.DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}	catch(PDOException $e) {
	//show error
	echo '<p class="bg-danger">'.$e->getMessage().'</p>';
}

//Include the user class, pass in the database connection
include('classes/user.php');
$user = new User($db);

// -----------------------------------------------
// Utility function.  Cleans data for SQL.
// Input: string data to clean of characters
// that could be used to reroute or inject
// javascript.
// Output: String with characters cleaned for 
// database use.
// -----------------------------------------------
function clean_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>