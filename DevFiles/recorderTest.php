<!DOCTYPE html>
<html>
	<head>
		<title>Video Record Test</title>
		<meta charset="utf-8"/>
		<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
		<script src="https://cdn.webrtc-experiment.com/gumadapter.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


		<script>
		var recordRTC;

		function successCallback(stream) {
		    // RecordRTC usage goes here

		    var options = {
		      mimeType: 'video/webm', // or video/mp4 or audio/ogg
		      audioBitsPerSecond: 128000,
		      videoBitsPerSecond: 128000,
		      bitsPerSecond: 128000 // if this line is provided, skip above two
		    };
		    recordRTC = RecordRTC(stream, options);
		    recordRTC.startRecording();
		}

		function errorCallback(error) {
		    // maybe another application is using the device
		}

		var mediaConstraints = { video: true, audio: true };

		navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);

		function btnStopRecording () {
				            console.log("reached outer");
		    recordRTC.stopRecording(function (audioVideoWebMURL) {
		        //video.src = audioVideoWebMURL;

		        	            console.log("reached inner");
		        var recordedBlob = recordRTC.getBlob();
		        recordRTC.getDataURL(function(dataURL) { });

	            var video = document.getElementById("webcamPlayback");
	            console.log(window.URL.createObjectURL(recordedBlob));
	            console.log("reached");
				video.src = window.URL.createObjectURL(recordedBlob);
				var videoBlob = new Blob ([recordedBlob]);
		   		uploadAudio(videoBlob);
		    });

		};

		function uploadAudio( blob ) {
		  var reader = new FileReader();
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
		  reader.readAsDataURL(blob);
		}
		</script>
	</head>
	<body>
	<video id="webcamPlayback" autoplay="true" controls src="" ></video>
	<button onclick="btnStopRecording()">Show and Restart</button>
	</body>
</html>