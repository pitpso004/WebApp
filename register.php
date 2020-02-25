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

</head>

<body>
    <form action="" method="GET" id="register">
        <center> Register <br>

            <?php
                        require('conn.php');

                        $username = "" ;
                        $password = "" ;
                        $name =  "" ;
                        $email = "" ;
                        $status = NULL ;

                        if(isset($_GET['username'])){ $username = $_REQUEST['username']; }
                        if(isset($_GET['password'])){ $password = $_REQUEST['password']; }
                        if(isset($_GET['name'])){ $name = $_REQUEST['name']; }
                        if(isset($_GET['email'])){ $email = $_REQUEST['email']; }

                        $sql = "SELECT User_username, User_email FROM register ";
                        $result = mysqli_query($conn, $sql);

                        if((mysqli_num_rows($result) > 0 ) and ($username != "" and $password != "" and $name != "" and $email != "")) { 
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
                            $sql = "INSERT INTO register (User_username, User_password, User_name, User_email) VALUES ('$username', '$password', '$name' ,'$email')";
                            $result = mysqli_query($conn, $sql);
                            echo "<font color='green'> Registration Completed Successfully. </font>";
                        }
                        mysqli_close($conn);

                ?>

            <br>

            Username: <input type="text" name="username" id="username"> <br>
            Password: <input type="text" name="password" id="password"> <br>
            Name: <input type="text" name="name" id="name"> <br>
            E-mail: <input type="text" name="email" id="email"> <br>
            <input type="submit" value="Submit" onclick="return CheckEmpty()"> <input type="reset" value="Clear">
        </center>

    </form>


</body>

</html>