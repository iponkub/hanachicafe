<?php
    // การเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $database = "hana";
    $username = "root";
    $password = "";
    $db = mysqli_connect($servername, $username, $password, $database);
    $db->set_charset("utf8");
    if($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
    } else {
        // echo "Connected successfully";
    }
    date_default_timezone_set('Asia/Bangkok');
    // $mysqltime = date ('Y-m-d H:i:s'); 
    // echo "$mysqltime";
?>