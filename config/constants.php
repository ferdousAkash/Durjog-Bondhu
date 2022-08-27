<?php
    //Start Session
    session_start();



    //create Constants to Store Non Repeating Values
    define('ORDERURL', 'http://localhost/prj/products.php');

    define('SITEURL', 'http://localhost/prj/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>