<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br> 

        <?php
        
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        ?>

        <form action="" metohd="POST">

            <table class="tbl-30">
                <tr>                
                    <td>Old Password: </td>
                    <td>
                        <input type="password" name="old_password" placeholder="Current Password"> 
                    </td>
                </tr>

                <tr>                
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password"> 
                    </td>
                </tr>

                <tr>                
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password"> 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password">
                    </td>
                </tr>
            </table>

        </form>

    </div>

</div>

<?php 

    //Check whether the submit button is clicked or not
    if($_POST['submit'])
    {
        //echo "Button Clicked";
        //1. Get the data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2. check wheter the user with the current ID and current password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        //Execute the query
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            //Check whether data is available or not
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exists and password can be changed
                //echo "User Found";
                //check wheter the new password and confirm match or not
                if($new_password==$confirm_password)
                {
                    //update password
                    //echo "Password Match"

                    $sql2 = "UPDATE tbl_admin SET
                        password='$new_password' 
                        WHERE id=$id
                    ";

                    //Execute the query
                    $res2 = mysqli_query($conn,$sql2);

                    //check whether the query executed or not
                    if($res2==true)
                    {
                        //display success message
                        //redirect to manage madmin page with success message
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                        //redirect to manage admin page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //display error message
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password.</div>";
                        //redirect to manage admin page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    $_SESSION['pwd-not-match'] = "<div class='success'>Password Did not Match.</div>";
                    //Redirect the USer
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //user does not exists set message and redirect
                $_SESSION['user-not-found'] = "<div class='success'>User Not Found.</div>";
                //Redirect the USer
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            
        }

        //3. check wheter the new password and confirm password match or not



        //4. Change password if all above is ture
    }

?>

<?php include ('partials/footer.php');?>