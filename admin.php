<html>
    <head>
        <title>ADMIN</title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="search" id="search">
            <input type="submit" value="ค้นหา">
        </form>
    </body>
</html>

<?php 
    $search = "" ;
    if(isset($_REQUEST['search'])){
        $search = $_REQUEST['search'];

        $conn = mysqli_connect('localhost','root','','non');
        
        $sql = "SELECT * FROM register WHERE User_name LIKE"." '%".$search."%'";

        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            echo "Name: ".$row['User_name']." E-mail: ".$row['User_email']." " ;
            if($row['User_state']==1){
                echo "<font color='green'>Online</font> <br>";
            }else{echo "<font color='red'>Offline</font> <br>";}
        }
        mysqli_close($conn);
    }$_
?>