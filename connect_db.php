<?php
require('conn.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$num = 0 ;

$sql = "SELECT User_username, User_email FROM register ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // เช็คข้อมูลทั้งหมดในแถว
    while($row = mysqli_fetch_assoc($result)) {
        if ($row["User_username"] == $username){$num = $num + 1;}
        if ($row["User_email"] == $email){$num = $num + 1;}

    }
    if ($num >= 1){echo " Username or E-mail is taken. Try another";}
    else{   $sql = "INSERT INTO register (User_username, User_password, User_name, User_email)
            VALUES ('$username', '$password', '$name' ,'$email')";

            $result = mysqli_query($conn, $sql); 
    }
}
?>