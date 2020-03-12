<?php
require('conn.php');

$sql = "UPDATE register SET User_state = '".$_SESSION['state']."' WHERE User_username = '".$_SESSION['username']."'" ;
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>