<?php
    
    //include constants.php file here
    include('../config/constants.php');

    // 1. Get the ID of Admin to be deleted 
    echo $id = $_GET['id'];

    // 2.Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not 
    if($res==TRUE)
    {
        //Query Executed
        //echo" Deleted";
        //Create Session variable to display message
        $_SESSION['delete'] = "<div class ='success' > Admin Deleted Successfully!</div>";
        //REDIRECT to Manage admin page
        header('location:' .SITEURL. 'admin/manage-admin.php');
    }
    else{
        //Failed ot delete admin
        //echo "Failed to delete admin";

        $_SESSION['delete'] = "<div class = 'error' Failed to Delete Admin. Try again later!</div>";
        header('location:' .SITEURL. 'admin/manage-admin.php');
    }
    // 3.Redirect to manage admin page with message(success/error)


?>
