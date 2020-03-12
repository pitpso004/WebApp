<?php
session_start();
if(!isset($_SESSION['state'])){
    header("Location:login.php");
}
?>

<head>

    <title>Gallery Picture</title>
    <script>
        function back(){
				window.close("gallery.php");
			}

    </script>

</head>

<body>

    <div>
        <?php
            $dirname = "images/"; // "images/" , "C:/Users/ASUS TUF/Downloads/"
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