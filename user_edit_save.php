<?php
    session_start();
    include_once 'connect.php';
    
    // การรับข้อมูลมาใส่ในตัวแปร
    $id = $_SESSION['UserID'];
    $email=$_POST["email"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $tel=$_POST["tel"];

    echo "<hr> $id / $email / $name / $password / $tel ";
    $sql = "UPDATE member SET email='$email', name='$name', password='$password', 
    tel='$tel' WHERE id='$id' ";
    $result = mysqli_query($db,$sql);

    
    if(!$result){
        echo " <hr> การบันทึกข้อมูลผิดพลาด : ERROR !!!";
    }else{
        echo " <hr> บันทึกข้อมูลเรียบร้อยแล้ว : OK";
    }
    header("refresh:2;url=index.php");
?>