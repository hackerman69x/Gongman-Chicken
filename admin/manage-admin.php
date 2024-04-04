<?php include('partials/menu.php'); ?>


        <!----------Main Content Section Starts--------->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br>

                <?php 
                    if(isset($_SESSION['add'])){

                        echo $_SESSION['add']; //add session msg
                        unset($_SESSION['add']); // remove session msg
                    }
                    
                    if(isset($_SESSION['delete'])){

                        echo $_SESSION['delete']; 
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update'])){

                        echo $_SESSION['update']; 
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found'])){

                        echo $_SESSION['user-not-found']; 
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match'])){

                        echo $_SESSION['pwd-not-match']; 
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd'])){

                        echo $_SESSION['change-pwd']; 
                        unset($_SESSION['change-pwd']);
                    }
                ?>
                <br><br>

                <!----------Admin Button--------->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query to get admin data
                        $sql= "SELECT * FROM tbl_admin";
                        //Execute the query
                        $res= mysqli_query($conn, $sql);

                        //check whether the query executed or not
                        if($res==TRUE)
                        {
                            //count rows to check the data in the database
                            $count = mysqli_num_rows($res); //function to get all the rows

                            $sn=1;  //create a variable and assign the value

                            if($count>0)
                            {
                                //meron data
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //use of while loop to get all the data in the database and will run as long as may data sa database

                                    //get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //display the values in the table
                                    ?>


                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                    

                                    <?php

                                }
                            }
                            else
                            {

                                //wlang data
                            }
                                
                            
                             
                        }
                    
                    ?>

                    
                    
                </table>

               
            </div>

        </div>
        <!----------Main Content Section Ends--------->

<?php include('partials/footer.php'); ?>