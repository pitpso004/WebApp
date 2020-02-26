<?php
require('conn.php');

$name = "" ;
$username = "" ;
$password = "" ;

if(isset($_GET['username'])){ $username = $_REQUEST['username']; }
if(isset($_GET['password'])){ $password = $_REQUEST['password']; }

$sql = "SELECT User_username, User_password, User_name FROM register ";
$result = mysqli_query($conn, $sql);

if((mysqli_num_rows($result) > 0 ) and ($username != "" and $password != "")) { 
    // ค้นหาข้อมูลจากในตาราง 
    while($row = mysqli_fetch_assoc($result)){
        if($row['User_username'] == $username and $row['User_password'] == $password){
            $name = $row['User_name'];
            mysqli_close($conn);
        break;
        }
    }
}

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