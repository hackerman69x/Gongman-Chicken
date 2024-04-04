<?php

    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of the Admin to be deleted
    $id = $_GET['id'];
    

    // 2. create SQL query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successfully and Admin Deleted
        //echo "Admin Deleted";
        //Create Session Variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to delete Admin
        echo "Failed to Delete Admin";

        //Create Session Variable to display message
        $_SESSION['delete'] = "<div class='success'>Failed to Delete Admin. Try Again Later.</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    
    // 3. Redirect to Manage Admin page with message (success/error)

    



?>