<?php
    session_start();
    require_once '../connect.php';

    // การรับข้อมูลมาใส่ในตัวแปร

    $id=$_POST["food_id"];
    $food_name=$_POST["food_name"];
    $food_type=$_POST["food_type"];
    $food_price=$_POST["food_price"];

    $file_name=$_FILES["food_picture"]["name"];
    $file_tmp=$_FILES["food_picture"]["tmp_name"];
    echo "<hr> $id / $food_name / $food_type / $food_price / $file_name";

    if($file_name!=""){
        move_uploaded_file($file_tmp,"../vendor/img/".$file_name);
        $sql="UPDATE food SET food_name='$food_name', food_type='$food_type', food_price='$food_price', food_picture='$file_name' WHERE food_id='$id'";
        $result=mysqli_query($db,$sql);
        echo '<script>alert("บันทึกข้อมูลสำเร็จ")</script>';
        Header("refresh:3;url=p_1.php");
    }else{
        $sql="UPDATE food SET food_name='$food_name', food_type='$food_type', food_price='$food_price' WHERE food_id='$id'";
        $result=mysqli_query($db,$sql);
        echo '<script>alert("บันทึกข้อมูลสำเร็จ")</script>';
        Header("refresh:3;url=p_1.php");
    }

?>