<?php
    session_start();
    require_once 'connect.php';
    $id=$_SESSION["UserID"];
    $file_name=$_FILES["user_picture"]["name"];
    $file_tmp=$_FILES["user_picture"]["tmp_name"];

    if($file_name!=""){
        move_uploaded_file($file_tmp,"vendor/img/".$file_name);
        $sql="UPDATE member SET user_picture='$file_name' WHERE id='$id' ";    /*uploded_user ในsql*/
        $result=mysqli_query($db,$sql);
        Header("refresh:2;url=index.php");
    }else{
        header('Location=user_picture.php');
    }

?>

