<html>

<head>
    <title>Log in</title>
    <script>
        function CheckEmpty() { // เช็คค่าว่างในการ ลงทะเบียน

            var username = document.forms["login"]["username"].value;
            var password = document.forms["login"]["password"].value;

            if (username == "" || username == null || password == "" || password == null) {
                alert("Please fill out all the required fields.");
                return false;
            }
        }
    </script>
</head>

<body>
    <form action="main.php" method="GET" id="login">
        <center> Log in <br>
            <?php

                require('conn.php');

                $username = "" ;
                $password = "" ;
                $name = "" ;
                $status = NULL ;

                if(isset($_GET['username'])){ $username = $_REQUEST['username']; }
                if(isset($_GET['password'])){ $password = $_REQUEST['password']; }

                $sql = "SELECT User_username, User_password, User_name FROM register ";
                $result = mysqli_query($conn, $sql);

                if((mysqli_num_rows($result) > 0 ) and ($username != "" and $password != "")) { 
                    // ค้นหาข้อมูลจากในตาราง 
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['User_username'] == $username and $row['User_password'] == $password){
                            $status = FALSE ;
                            $name = $row['User_name'];
                            mysqli_close($conn);
                            
                        break;
                        }
                    $status = TRUE ; 
                    }
                }
                if($status == TRUE){
                    header("Location:login.php");
                    echo "<font color='red'> The Username or Password Is Incorrect. Try Again. </font>" ;
                }
            ?><br>

            Uesrname: <input type="text" id="username" name="username"> <br>
            Password: <input type="password" id="password" name="password"> <br>
            <input type="submit" value="Log in" onclick="return CheckEmpty() ">
        </center>

    </form>

</body>

</html>