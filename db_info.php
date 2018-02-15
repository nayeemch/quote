<?php ob_start();

    $dbserver = 'localhost'; // 127.0.0.1
    $dbuser = 'root';
    $dbpassword = '';
    $database  = 'QuoteDB';

    $conn = new mysqli($dbserver,$dbuser,$dbpassword,$database);

    mysqli_set_charset($conn, 'utf8');

    if(!$conn){
        die("Couldn't Connect to the database".mysql_errno());
    }
    // else
    //  echo "connected to db";
