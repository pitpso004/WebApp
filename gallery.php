<?php
session_start();
if($_SESSION['state'] != '1'){
    header("Location:login.php");
}
?>

<html>

    <head>
        <title>Selfie Man</title>
        <script>
            function back(){
                window.close("gallery.php");
            }

            function delete_img(){
                if(confirm("Are you sure to delete this image?")) {
                    return true ;
                }{return false ;}
            }
        </script>

        <style>
            body {
                background-color: #94D3DB;
                background-size: 100% 100%;
            }
            .grid-container {
                display: grid;
                grid-template-columns: auto auto auto auto auto auto ;
                padding: 10px;
            }
            .grid-item {
                padding: 10px;
            }
        </style>

    </head>

    <body>
        <h2>Gallery Picture</h2>
        <div class="grid-container">
            <?php
                $dirname = $_SESSION['username']."/" ; //โฟลเดอร์ภาพ
                $images = glob($dirname."*.jfif");  //Url รูปภาพ
                                
                foreach($images as $image) {
                    echo '<div class="grid-item">' ;
                    echo '<form action="delete.php" method="POST" id="'.$image.'" name="'.$image.'" onsubmit="return delete_img()">' ;
                    echo '<button type="submit"><img src="'.$image.'" height="150" width="210"></button>' ;
                    echo '<input type="hidden" name="url_img" id="url_img" value="'.$image.'">' ;
                    echo '</form>' ;
                    echo '</div>' ;
                }
            ?>
        </div>
            <br>
            <input type="button" value="Back" onclick="back()">
    </body>

</html>
