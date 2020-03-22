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

    <form action="" method="GET" id="login">
        <center> Log in <br>
            <?php
                session_start();
                require('conn.php');

                $username = "" ;
                $password = "" ;
                $state = "";

                if(isset($_GET['username'])){ $username = $_REQUEST['username']; }
                if(isset($_GET['password'])){ $password = $_REQUEST['password']; }

                $sql = "SELECT User_username, User_password, User_state, User_name FROM register";
                $result = mysqli_query($conn, $sql);

                if((mysqli_num_rows($result) > 0 ) and ($username != "" and $password != "")) { 
                    // ค้นหาข้อมูลจากในตาราง 
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['User_username'] == $username and $row['User_password'] == $password){
                            if($row['User_state'] == '0'){
                                $state = "0";
                                $_SESSION['username'] = $row['User_username'];
                                $_SESSION['state'] = "1";
                                $_SESSION['name'] = $row['User_name'];
                                require('update_state.php');
                                mysqli_close($conn);
                                header("Location:main.php");
                                
                                break;
                            }else if($row['User_state'] == '1'){
                                $state = "0";
                                echo "<font color='red'> This Username is Logining In Use. </font>" ;
                                mysqli_close($conn);
                                
                                break;
                            }
                    }else{$state = "1";}
                    }
            }if($state == "1"){
                echo "<font color='red'> The Username or Password Is Incorrect. Try Again. </font>" ;
            }
            ?><br>

            Username: <input type="text" id="username" name="username"> <br>
            Password: <input type="password" id="password" name="password"> <br>
            <input type="submit" value="Log in" onclick="return CheckEmpty()">
            <a href="register.php">Register</a>
        </center>

    </form>

</body>
</html>