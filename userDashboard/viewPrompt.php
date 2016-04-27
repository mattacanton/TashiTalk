<?php
//======================================================================
// author-Daniel Baggott
// Apr 26 2016
//
// viewPrompt.php
// Displays assignment/prompt picture allowing the user to record 3
// video response attempts and submit one.
// expected input: Webcam and clicking record, stop record, and submit buttons
// possible output: A video file
//======================================================================

include ('../userSystem/userBase.php'); 
require_once('mysqli_connect.php');
include ('../siteWideResources/userCheck.php');

//Sets the incoming session into session variables via get form method
if(isset($_GET['assignment_id'])){$_SESSION['assignment_id'] = $_GET['assignment_id'];} 
if(isset($_GET['teacher_id'])){$_SESSION['teacher_id'] = $_GET['teacher_id'];} 
if(isset($_GET['class_id'])){$_SESSION['class_id'] = $_GET['class_id'];} ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TashiTalk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- <script src="../siteWideResources/jquery-2.2.2.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="../siteWideResources/animate.css">
    <script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
	<script src="https://cdn.webrtc-experiment.com/gumadapter.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src="../siteWideResources/jquery-2.2.2.min.js"></script>
	<script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    //Pulls the specific assignment row from the database.
    $assignment_id = $_SESSION['assignment_id'];
    $query = "SELECT * FROM Assignments WHERE assign_id=".$assignment_id;
	$result = mysqli_query($dbc, $query);
	$row=mysqli_fetch_assoc($result);
    ?>
      
<!--     Record RTC Javascript-->
     <script>
		var recordRTC;
		var cameraStream;
		var streamStarted = false;
		var currentAttempt = 1;

		var attemptOneBlob = null;
		var attemptTwoBlob = null;
		var attemptThreeBlob = null;


		// -----------------------------------------------
		// Starts recording video from the webcam.
		// -----------------------------------------------
		function btnStartRecording() {
			// Initialize on click if stream already started
		    if (streamStarted){	
			    var options = {
			      mimeType: 'video/webm', // or video/mp4 or audio/ogg
			      audioBitsPerSecond: 128000,
			      videoBitsPerSecond: 128000,
			      bitsPerSecond: 128000 // if this line is provided, skip above two
			    };
			    //Start recording call
			    recordRTC = RecordRTC(cameraStream, options);
			    recordRTC.startRecording();
			}
		}
         
        // -----------------------------------------------
        // Shows the webcam video live on screen
        // -----------------------------------------------
        function successCallback(stream) {
                var videoStream = document.getElementById("streamWebcam");
                videoStream.src = window.URL.createObjectURL(stream);
                cameraStream = stream;
                streamStarted = true;
        }

        // -----------------------------------------------
        // If error with webcam access this method
        // is run.  Useful for error notification.
        // -----------------------------------------------
		function errorCallback(error) {
		    
		}

		//Setting up required constraints and access for recording
		var mediaConstraints = { video: true, audio: true };
		navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);


		// -----------------------------------------------
		// This function stops the recording and stores the
		// video recorded for tracking and sets the html
		// to display a compatable version.
		// -----------------------------------------------
		function btnStopRecordingFirst () {
			
			//Stop recording create and pass video blob
			//assign to tracking and set viewable 	           
		    recordRTC.stopRecording(function (audioVideoWebMURL) {
		        var recordedBlob = recordRTC.getBlob();
		        recordRTC.getDataURL(function(dataURL) { });
		  		
		  		//If first attempt set recorded video to display and track it 
		        if (currentAttempt == 1){
		            var playerOne = document.getElementById("attemptOnePlayer");
					playerOne.src = window.URL.createObjectURL(recordedBlob);
					attemptOneBlob = new Blob ([recordedBlob]);
					currentAttempt = 2;
				}
				//If seccond attempt set recorded video to display and track it 
				else if (currentAttempt == 2){
		            var playerTwo = document.getElementById("attemptTwoPlayer");
					playerTwo.src = window.URL.createObjectURL(recordedBlob);
					attemptTwoBlob = new Blob ([recordedBlob]);
					currentAttempt = 3;
				}
				//If third attempt set recorded video to display and track it 
				else if (currentAttempt == 3){
		            var playerThree = document.getElementById("attemptThreePlayer");
					playerThree.src = window.URL.createObjectURL(recordedBlob);
					attemptThreeBlob = new Blob ([recordedBlob]);
					currentAttempt = 4;
				}
		    });

		};
				
		// -----------------------------------------------
		// Encode and pass the blob to a file to handle
		// upload and saving.
		// -----------------------------------------------
		function uploadAttempt( blob ) {
		  var reader = new FileReader();
		  //when reader loaded begin setting data and constraints
		  reader.onload = function(event){
		    var fd = {};
		    fd["fname"] = "test.wav";
		    fd["data"] = event.target.result;
		    $.ajax({
		      type: 'POST',
		      url: 'uploader.php',
		      data: fd,
		      dataType: 'text'
		    }).done(function(data) {
		        console.log(data);
		    });
		  };
		  //reads data in
		  reader.readAsDataURL(blob);
		  setTimeout(redirect, 6000)
		}

		// -----------------------------------------------
		// After upload redirect the user to the upload
		// complete page.
		// -----------------------------------------------
		function redirect(){
			document.location.href = 'submitted.php';
		}
    </script>
      
      
  </head>
  <body>

  	<!-- Nav bar -->
    <?php include 'navbar.php' ?>

      
<!--      Present Prompt     -->
<div class="container" >
  
  <div class="text-center" >
    <h1><?php echo $row['prompt_name']; ?></h1>
  </div>
<div class="row">
  <div class="col-sm-6">
    <img class="img-responsive pull-right" src="<?php echo $row['prompt_loc']; ?>" alt="Attempt 1">
  </div>
  <div class="col-sm-6">
    <h4 class="media-heading">Instructions:</h4>
    <?php echo $row['prompt_text']; ?>
    <br>
    <br>
    <button type="button" class="btn btn-warning" onclick="btnStartRecording()">Record Response</button>
    <button type="button" class="btn btn-success" onclick="btnStopRecordingFirst()">End Recording</button>
    <video id="streamWebcam" muted class="scaling-video" autoplay="true" src=""></video>
  </div>
</div>
    

    
</div><!-- /.container -->


<!--  Display attempts with upload option  -->
<div class="container">
	<div class="row">
	    <div class="col-sm-4">
	    	<div class="well switchboard">Attempt 1 of 3
            <video id="attemptOnePlayer" class="scaling-video-sm" controls src=""></video>
            <button type="button" class="btn btn-primary" onclick="uploadAttempt(attemptOneBlob)" >Submit this Attempt</button>
            </div>
	    </div>
	    <div class="col-sm-4">
	    	<div class="well switchboard">Attempt 2 of 3
	    	<video id="attemptTwoPlayer" class="scaling-video-sm" controls src=""></video>
            <button type="button" class="btn btn-primary" onclick="uploadAttempt(attemptTwoBlob)" >Submit this Attempt</button>
	    	</div>

	    </div>
	    <div class="col-sm-4">
	       	<div class="well switchboard">Attempt 3 of 3
	    	<video id="attemptThreePlayer" class="scaling-video-sm" controls src=""></video>
            <button type="button" class="btn btn-primary" onclick="uploadAttempt(attemptThreeBlob)" >Submit this Attempt</button>
	    	</div>
	    </div>
	</div>
</div>

  </body>
</html>