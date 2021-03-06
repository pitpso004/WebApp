<?php
session_start();
if($_SESSION['state'] != '1'){
    header("Location:login.php");
}
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Selfie Man</title>
	<style>
		body {
			font-family: Helvetica, sans-serif;
			background-color:#94D3DB;
            background-size: 100% 100%;
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

		<!-- เรียกใช้งาน Webcam.js JavaScript Library -->
		<script src="webcam.min.js"></script>

		<!-- กล้อง -->
		<script>
			Webcam.set({
				width: 320,
				height: 240,
				image_format: 'jpeg',
				jpeg_quality: 200
			});
			Webcam.attach('#my_camera');
		</script>

		<!-- ปุ่มบันทึกภาพ -->
		<form>
			
			<input type="button" value="Take Snapshot" onclick="take_snapshot()">
			<input type="button" value="Back" onclick="back()">

			<br><br>

			<div id='capture'></div>
		</form>
	</center>
	<script>
		function addZero(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		}

		function myFunction() {
			var time = new Date();
			return time;
		}

		function take_snapshot() {
			// บันทึกภาพจากกล้อง
			Webcam.snap(function (data_uri) {
				var time = myFunction();
				// แสดงไฟล์รูปที่บันทึกได้ออกมา
				var name = "<?php echo $_SESSION['name']; ?>";
				document.getElementById('capture').innerHTML =
					"<a href='" + data_uri + "' download='" + name + time + "'> <img src='" + data_uri + "'> </a>" +
					"<br>" + "<br>" +
					"<h3> Click Image to Download </h3>"
			});
		}

		function back() {
			window.close("live.php");
		}
	</script>
</body>

</html>