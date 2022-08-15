<?php   

    include('../config/constants.php'); 
    include('login-check.php');
    
?>



<html>
    <head>
        <title>Food Order Website - Home Page </title>

        <link rel = "stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!-- Menu Section Starts -->
        <div class ="menu text-center">
            <div class= "wrapper">
                <ul>
                    <li> <a href="index.php"> HOME </a></li>
                    <li> <a href="manage-admin.php"> admin </a></li>
                    <li> <a href="manage-category.php"> CATAGORY </a></li>
                    <li> <a href="manage-food.php"> FOOD </a></li>
                    <li> <a href="manage-order.php"> ORDER </a></li>
                    <li> <a href="logout.php"> Logout </a></li>

                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->