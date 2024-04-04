<?php include('partials/menu.php');  ?> 


<div class="main-content">
     <div class="wrapper">
            <h1>Add Admin</h1>

            <br><br>

            <?php 
                    if(isset($_SESSION['add'])){ //check if the session is set or not

                        echo $_SESSION["add"]; //display session msg
                        unset($_SESSION["add"]); // remove session msg
                    }
                
                ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter your name"> 
                        </td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter your username"> 
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter your password"> 
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                
                    </tr>

                   

                </table>    



            </form>
     </div>
</div>




<?php include('partials/footer.php') ?>


<?php 
    //Process the value from form and save it in the database


    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button clicked
        //echo "Button clicked";

        //Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Paasword Encryption with MD5

        //SQL Query to save the data into the database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        
        

        // Execute query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

       // Check if the (Query is Executed) data is inserted or not adn display appropriate message
       if($res==TRUE)
       {
            //success
            //echo "data good";
            // create session to display msg
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect Page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');


       }
       else
       {
            //failed
            //echo "data bad";
            // create session to display msg
            $_SESSION['add'] = "Admin Added Failed";
            //Redirect Page to add admin
            header("location:".SITEURL.'admin/add-admin.php');

       }

    }
   
?>