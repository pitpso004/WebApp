<?php
session_start();
if($_SESSION['state'] != '1'){
    header("Location:login.php");
}
?>

<head>

    <title>Selfie Man</title>
    <script>
        function back(){
				window.close("gallery.php");
			}

    </script>

</head>

<body>

    <div>
        <h2>Gallery Picture</h2>
        <?php
            $dirname = "images/" ; // "images/" , "C:/Users/ASUS TUF/Downloads/"
            $images = glob($dirname."*.jpg");
            
            foreach($images as $image) {
                echo '<img src="'.$image.'" height="150" width="210" alt="'.$image.'"> </&nbsp>' ;
            }
        ?>

        <br>
        <input type="button" value="Back" onclick="back()">
    </div>

</body>
</html>