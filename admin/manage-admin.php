<?php include('partials/menu.php'); ?>


        <!----------Main Content Section Starts--------->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br>

                <?php 
                    if(isset($_SESSION['add'])){

                        echo $_SESSION["add"]; //add session msg
                        unset($_SESSION["add"]); // remove session msg
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
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            <a href="#" class="btn-danger">Delete Admin</a>
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