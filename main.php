<?php
session_start();
?>

<html>
    <head>
        <title>Camera Man</title>
        <script>
            function videoLive(){
                window.open("live.php");
                window.close("main.php");
            }
        </script>
    </head>
    <body>
        <form action="" method="GET" id="main">
            <center> <h2>Camera Man</h2>
            <table border="1">
                <tr>
                    <td>
                        <h2><?php echo $_SESSION['name'] ;?></h2> 
                        <a href="login.php">Log out</a>
                    </td>
                    <td><div id="img"></div></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Live" onclick="videoLive()"></td>
                    <td><input type="submit" value="คลังวิดิโอ"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="การแจ้งเตือน"></td>
                    <td><input type="submit" value="สมาชิก"></td>
                </tr>
                <tr>
                    <td><input type="submit"></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
            </center>
        </form>        
    </body>
</html>