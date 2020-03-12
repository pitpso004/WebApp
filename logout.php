<?php
session_start();
$_SESSION['state'] = "0" ;
require('update_state.php');

session_destroy();
header("Location:login.php");
?>