<?php
    session_start();
    require_once '../connect.php';

    // การรับข้อมูลมาใส่ในตัวแปร
    $food_name=$_POST["food_name"];
    $food_type=$_POST["food_type"];
    $food_price=$_POST["food_price"];

    $file_name=$_FILES["food_picture"]["name"];
    $file_tmp=$_FILES["food_picture"]["tmp_name"];

    echo "<hr> $food_name / $food_type / $food_price / $file_name ";

    if($file_name!=""){
        move_uploaded_file($file_tmp,"../vendor/img/".$file_name);
        $sql="INSERT INTO food (`food_id`, `food_name`, `food_type`, `food_price`, `food_picture`) VALUES (NULL,'$food_name','$food_type','$food_price','$file_name')";/*uploded_user ในsql*/
        $result=mysqli_query($db,$sql);
        echo '<script>alert("เพิ่มรายการอาหารเสร็จสิ้น")</script>';
        Header("refresh:1;url=p_1.php");
    }else{
        echo '<script>alert("บันทึกข้อมูลผิดพลาด")</script>';
        Header("refresh:3;url=p_1.php");
    }

?>