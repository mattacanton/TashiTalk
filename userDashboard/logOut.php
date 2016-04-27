<?php
//======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// logOut.php
// log out of the site
// expected input: none
// possible output: none
//======================================================================
include ('../userSystem/userBase.php');

session_destroy();

header("location: ../index.php");
?>