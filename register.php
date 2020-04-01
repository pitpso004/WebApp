<html>

<head>
    <title>
        Register
    </title>

    <script>
        function CheckEmpty() { // เช็คค่าว่างในการ ลงทะเบียน

            var username = document.forms["register"]["username"].value;
            var password = document.forms["register"]["password"].value;
            var name = document.forms["register"]["name"].value;
            var email = document.forms["register"]["email"].value;


            if ((username == "" || username == null) || (password == "" || password == null) ||
                (name == "" || name == null) || (email == "" || email == null)) {
                alert("Please fill out all the required fields.");
                return false;
            }
        }
    </script>
    <style>
        body{
            background-color:#94D3DB;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <form action="" method="POST" id="register">
        <center> Register <br>
            <?php
                        require('conn.php');

                        $username = "" ;
                        $password = "" ;
                        $name =  "" ;
                        $email = "" ;
                        $status = "" ;

                        if(isset($_POST['username'])){ $username = $_REQUEST['username']; }
                        if(isset($_POST['password'])){ $password = $_REQUEST['password']; }
                        if(isset($_POST['name'])){ $name = $_REQUEST['name']; }
                        if(isset($_POST['email'])){ $email = $_REQUEST['email']; }

                        $sql = "SELECT User_username, User_email FROM register ";
                        $result = mysqli_query($conn, $sql);

                        if($username != "" and $password != "" and $name != "" and $email != ""   ) { 
                            // ค้นหาข้อมูลจากในตาราง 
                            while($row = mysqli_fetch_assoc($result)){
                                if($row["User_username"] == $username or $row["User_email"] == $email){
                                    echo "<font color='red'> Username or E-mail is taken. Try another. </font>";
                                    $status = FALSE ;
                                break;
                                }
                            $status = TRUE ;
                            }
                        }
                        if($status == TRUE){
                            $sql = "INSERT INTO register (User_username, User_password, User_name, User_email, User_state) VALUES ('$username', '$password', '$name', '$email','0')";
                            $result = mysqli_query($conn, $sql);
                            mkdir("$username");
                            echo "<font color='green'> Registration Completed Successfully. </font>";
                        }
                        mysqli_close($conn);

                ?>

            <br>

            Username: <input type="text" name="username" id="username"> <br>
            Password: <input type="text" name="password" id="password"> <br>
            Name: <input type="text" name="name" id="name"> <br>
            E-mail: <input type="text" name="email" id="email"> <br>
            <input type="submit" value="Submit" onclick="return CheckEmpty()">
            <a href="login.php">Login</a>
        </center>

    </form>


</body>

</html>