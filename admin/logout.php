<?php
    //include constants.php for SITEURL
    include('../config/constants.php');
    //delete all the ssession
    //1.deptroy the session 
    session_destroy();//unsets $_SESSIO['user]

    //2. Redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>
