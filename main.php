<?php
session_start();
if(!isset($_SESSION['state'])){
    header("Location:login.php");
}else{
    // require('notify.php');
}
?>

<html>

<head>
    <title>Camera Man</title>
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
        <h2>Camera Man</h2>
        <table border="1">
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
                <td><input type="submit" value="Live" onclick="videoLive()"></td>
                <td><input type="submit" value="คลังวิดิโอ" onclick="galleryPicture()"></td>
            </tr>
            <tr>
                <td><input type="submit" value="การแจ้งเตือน"></td>
                <td><input type="submit" value="สมาชิก"></td>
            </tr>
        </table>
    </center>
</body>

</html>