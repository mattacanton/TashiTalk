<?php
ob_start();
session_start();

//Database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'LanguageBounce');
define('DBPASS', 'wPeb7qQ4YdEYZ34L9T7DnV');
define('DBNAME', 'goga_database');

//Application address (Deals with Email verifcation, skipped for now)

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


function clean_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>