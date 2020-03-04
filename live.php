<?php
	session_start();
?>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Webcam</title>
		<style>
			body {
				font-family: Helvetica, sans-serif;
			}

			h2,
			h3 {
				margin-top: 0;
			}

			form {
				margin-top: 15px;
			}

			form>input {
				margin-right: 15px;
			}

			#results {
				float: right;
				margin: 20px;
				padding: 20px;
				border: 1px solid;
				background: #ccc;
			}
		</style>
	</head>

	<body>
		<center>
		<h1>Webcam</h1>
		<h3>Click on the button for capture image</h3>

		<div id="my_camera"></div>

		<!-- Webcam.js JavaScript Library -->
		<script src="webcam.min.js"></script>

		<!-- camera -->
		<script>
			Webcam.set({
				width: 320,
				height: 240,
				image_format: 'jpeg',
				jpeg_quality: 200
			});
			Webcam.attach('#my_camera');
		</script>

		<!-- A button for taking snaps -->
		<form>
			<input type="button" value="Take Snapshot" onclick="take_snapshot()">
			<input type="button" value="Back" onclick="back()">

			<div id='capture'></div>
		</form>
		</center>
		<script>
			function take_snapshot() {
				// take snapshot and get image data
				Webcam.snap(function (data_uri) {
					// display results in page
					var name = "<?php echo $_SESSION['name']; ?>" ;
					document.getElementById('capture').innerHTML = "<a href='" + data_uri + "' download='" + name + "' '> <img src='" + data_uri + "'> </a>" + "<br>"
					});
				}
			function back(){
				window.open("main.php");
				window.close("live.php");
			}
		</script>
	</body> 
</html>