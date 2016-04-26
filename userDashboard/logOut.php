<?php
include ('../userSystem/userBase.php');

session_destroy();

header("location: ../index.php");
?>