<?php

//Start session to access SESSION variables
session_start();

// Forward user to user dashboard if they are signed in (Note different path on index than typical sub folder pages)
if (isset($_SESSION['first_name'])) {
  header("location: ./userDashboard/");
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
	<body class="landing">
        
<!--		 Early Load Background set         -->
<!--
        <style>
        body{
                background-color:#F5F5F5
        }
        </style>
-->

		<!-- Header -->
			<header id="header">
				<h1><a href="./">TashiTalk</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="./contactLoggedOut">Contact/Feedback</a></li>
						<li><a href="./signUp" class="button special">Sign Up</a></li>
                        <li><a href="./signIn" class="button special">Sign In</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>Hi. This is TashiTalk.</h2>
				<p>Learn and speak with a Japanese or English partner for FREE.</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Talk with a partner</h2>
						<p>Chat with a foreign speaker, View language lessons, Practice responding to prompts</p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-comments"></i>
								<h3>Live Video Chat</h3>
								<p>Live video and audio chat with foreign Japanese or English speakers as you learn around the globe.</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-desktop"></i></a>
								<h3>View Language Lessons</h3>
								<p>View and study professional Japanese or English language lessons collage students use for free!</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-video-camera"></i>
								<h3>Video Quizzes</h3>
								<p>Practice responding via webcam to a variety of prompts.  If you have a teacher they can assign or review recordings.</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Teacher's can use TashiTalk too!</h2>
						<p>Assign and receive student submitted live chat recordings and prompts</p>
					</header>
					<div class="row 150%">

						<div class="6u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-comments"></i>
								<h3>Assign Live Chat</h3>
								<p>Create a live chat assignments.  Your students can share chat session clips they submit to fulfill the assignements.</p>
							</section>
						</div>
						<div class="6u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-video-camera" ></i>
								<h3>Assign video Quizzes</h3>
								<p>Assign a prompt text video or otherwise.  Your students can submit their video recorded responses.</p>
							</section>
						</div>
                    </div>
					<header class="major">
						<h2>Please Contact Us to Recieve Teacher Authorization</h2>
					</header>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Sign up for TashiTalk</h2>
						<p>Join and start learning today!</p>
					</header>
				</div>
				<ul class="actions">
					<li>
						<a href="./signUp" class="button bigAction">Sign Up for TashiTalk</a>
					</li>
				</ul>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
				    <!-- <div class="8u 1u$(medium)"> -->
                        <ul class="copyright text-left">
                            <li>&copy; TashiTalk. All rights reserved.</li>
                        </ul>
				    <!-- </div> -->
				</div>
			</footer>
        <script>
//            Enables jQuery's smooth scrolling to #div tag
            $(document).ready(function(){
                $('a[href^="#"]').on('click',function (e) {
                    e.preventDefault();

                    var target = this.hash;
                    var $target = $(target);

                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 900, 'swing', function () {
                        window.location.hash = target;
                    });
                });
            });
        </script>
	</body>
</html>