<html>
    <head>
        <title>
            Register
        </title>
        
    <script>
        function CheckEmpty() {

            var username = document.forms["main"]["username"].value;
            var passwowrd = document.forms["main"]["password"].value;
            var name = document.forms["main"]["name"].value;
            var email = document.forms["main"]["email"].value;

            
            if ((username == "" || username == null) || (password == "" || password == null) 
            || (name == "" || name == null) || (email == "" || email == null))  {
                alert("Please fill out all the required fields.");
                return false;
            }
        }
    </script>

    </head>

    <body>
        <form action="" method="GET" id="main"> <center> Register <br>
                    <div><?php

                        require('conn.php');

                        $username = " " ;
                        $password = " " ;
                        $name =  " " ;
                        $email = " " ;
                        $num = 0 ;

                        if(isset($_GET['username'])){ $username = $_REQUEST['username']; }
                        if(isset($_GET['password'])){ $password = $_REQUEST['password']; }
                        if(isset($_GET['name'])){ $name = $_REQUEST['name']; }
                        if(isset($_GET['email'])){ $email = $_REQUEST['email']; }

                        $sql = "SELECT User_username, User_email FROM register ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // เช็คข้อมูลทั้งหมดในแถว
                            while($row = mysqli_fetch_assoc($result)) {
                                if ($row["User_username"] == $username){$num = 1;}
                                if ($row["User_email"] == $email){$num =  1;}

                            }
                            if ($num >= 1){echo " Username or E-mail is taken. Try another.";}
                            if ($username != "" and $password != "" and $name != "" and $email != ""){
                                    $sql = "INSERT INTO register (User_username, User_password, User_name, User_email)
                                    VALUES ('$username', '$password', '$name' ,'$email')";

                                    $result = mysqli_query($conn, $sql);
                            }
                        }header("login.php"); 
                    ?> </div>

                    Username: <input type="text" name="username" id="username"> <br>
                    Password: <input type="text" name="password" id="password"> <br>
                    Name: <input type="text" name="name" id="name"> <br>
                    E-mail: <input type="text" name="email" id="email"> <br>
                    <input type="submit" value="Submit" onclick="CheckEmpty()"> <input type="reset" value="Clear">
            </center>
                
        </form>


    </body>
</html>

