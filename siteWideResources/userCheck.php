<?php
//======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// userCheck.php
// 
// expected input: none
// possible output: redirection if not logged in
//======================================================================
if (!isset($_SESSION['first_name'])) {
  header("location: ../index.php");
}
?>