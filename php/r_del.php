<?php 
    require_once '../connect.php';
    if(isset($_GET['food_id'])) {
        $id=$_GET['food_id'];
        
        $sql = "DELETE FROM food where food_id='$id'";
        $result= mysqli_query($db,$sql);
        if($result){
            echo "<script>alert('ลบเสร็จสิ้น')</script>";
        }else{
            echo "<script>alert('เกิดข้อผิดพลาด')</script>";
        }
        Header("refresh:0;url=p_1.php");
    }

?>