<?php include('../config/constants.php');?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>


    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login'])){

                    echo $_SESSION['login']; 
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message'])){

                    echo $_SESSION['no-login-message']; 
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- LOGIN FORM STARTS HERE -->
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"> <br><br>

                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"> <br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>

            </form>
            <!-- LOGIN FORM ENDS HERE -->



            <p class="text-center">Created by - <a href="www.gongmanchicken.com">Yoobin Kim, Giovan Gingoyon, Skylour Manalo</a></p>
        </div>

    </body>


</html>

<?php

    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for login
        //1. Get the data from the login form
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND PASSWORD='$password'";

        //3. Execute the query
        $res=mysqli_query($conn,$sql);


        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Available and loging success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username;  //TO check whether the user is logged in or not and logout will will unset it

            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not available and login failed
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    
    
    
    }

?>