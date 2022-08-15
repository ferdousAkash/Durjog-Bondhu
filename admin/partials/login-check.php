<?php

    //Check whether the user is logged in or not
    //Check whether the user is logged in or not
    if( ! isset($_SESSION['user']))//if the user session is not set
    {
        //user is not logged in
        //redirect to login page with message
        $_SESSION['no=login-message'] = "<div class='error' text-center> Please login to acess admin </div>";
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }

?>