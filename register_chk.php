<?php
    // เปิดฐานข้อมูล
    require_once 'connect.php';

    // การรับข้อมูลมาใส่ในตัวแปร
    $email=$_POST["email"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $tel=$_POST["tel"];
    $user_picture= "123.png";
    $user_level= "M";

    // การบันทึกลงฐานข้อมูล
    $sql="INSERT INTO member VALUES (NULL,'$email','$name','$password','$tel','$user_picture',NULL,'$user_level')";
    $result=mysqli_query($db,$sql);
    if(!$result){
        echo " <hr> การบันทึกข้อมูลผิดพลาด : ERROR !!!";
    }else{
        echo " <hr> บันทึกข้อมูลเรียบร้อยแล้ว : OK";
    }
    header("refresh:3;url=index.php");
?>