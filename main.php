<?php
session_start();
if($_SESSION['state'] != "1"){
    header("Location:login.php");
}else{
    // require('notify.php');
}
?>

<html>

<head>
    <title>Selfie Man</title>
    <script>
        function videoLive() {
            window.open("live.php");
        }

        function galleryPicture() {
            window.open("gallery.php");
        }
    </script>
</head>

<body>
    <center>
        <h2>Selfie Man</h2>
        <table border="1" id='table'>
            <tr>
                <td>
                    <h3>Hi.</h3>
                    <center>
                        <h2><?php echo $_SESSION['name'] ;?></h2>
                    </center>
                    <form action="logout.php">
                        <input type="submit" value="Log out" name="logout" id="logout">
                    </form>
                </td>
                <td>
                    <div id="img"></div>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="เปิดกล้อง" onclick="videoLive()"></td>
                <td><input type="submit" value="คลังรูปภาพ" onclick="galleryPicture()"></td>
            </tr>

        </table>
    </center>
</body>

</html>