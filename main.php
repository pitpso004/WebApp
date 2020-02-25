<?php
$name = $_REQUEST['name'];
?>
<html>
    <head>
        <title>Camera Man</title>
    </head>
    <body>
        <form action="" method="GET" id="main">
            <center> <h2>Camera Man</h2>
            <table border="1">
                <tr>
                    <td>
                        <h3><?php echo $name ;?></h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Live"></td>
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