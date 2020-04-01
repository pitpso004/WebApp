<?php
    $url_img = $_REQUEST['url_img'];
    unlink($url_img);
    header('Location:gallery.php');
?>