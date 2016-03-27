<?php

include ('../userSystem/userBase.php');

	// Incoming POST vars
	$message_email = $name_email = $entered_email_email = "";
	// Error vars
	$message_emailErr = "";
	// Success vars
	$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$contact_email = "personalbizemail@gmail.com";
	$subject_email = "WatashiTalk CONTACT FORM message";


	if(empty($_POST['message'])){
	$message_emailErr = "A message is required";
	$success = "";
	}
	else{
		$message_email = clean_input($_POST['email']);
		$name_email = clean_input($_POST['name']);
		$entered_email_email = clean_input($_POST['message']);

		$headers = "From: watashiContact@watashi.me\r\n";
		$headers .= "Return-Path: watashiContact@watashi.me\r\n";

		mail($contact_email, $subject_email, "Name: " . $name_email .  "\nEmail: " . $entered_email_email . "\nMessage: " . $message_email,$headers);
		$message_emailErr = "";
		$success = "Sent!  If you included a email expect a response soon.";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>TashiTalk</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="../">TashiTalk</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="../contactLoggedOut">Contact/Feedback</a></li>
						<li><a href="../signUp" class="button special">Sign Up</a></li>
                        <li><a href="../signIn" class="button special">Sign In</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->

			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Contact us</h2>
						<p>Have questions or feedback?  We love to hear both!</p>
						<p id="successMsg"><?php echo $success;?></p>
						<p id="successMsg"><?php echo $message_emailErr;?></p>
					</header>
				</div>
				<div class="container 50%">
					<form action="" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input name="name" id="name" value="" placeholder="Name" type="text">
							</div>
							<div class="6u$ 12u$(small)">
								<input name="email" id="email" value="" placeholder="Email" type="email">
							</div>
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Message" rows="6"></textarea>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input value="Send Message" class="special big" name="submit" type="submit"></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
				    <!-- <div class="8u 1u$(medium)"> -->
                        <ul class="copyright pull-left">
                            <li>&copy; TashiTalk. All rights reserved.</li>
                        </ul>
				    <!-- </div> -->
				</div>
			</footer>

	</body>
</html>