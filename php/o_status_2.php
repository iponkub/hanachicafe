<?php 
    require_once '../connect.php';
        
        $stat = $_POST['stat'];
        $o_id=$_GET['o_id'];
        $sql = "UPDATE order_head SET status='$stat' WHERE o_id='$o_id'";
        $result = mysqli_query($db,$sql);

        if(!$result){
            echo " <hr> การบันทึกข้อมูลผิดพลาด : ERROR !!!";
        }else{
            echo " <hr> บันทึกข้อมูลเรียบร้อยแล้ว : OK";
        }
        header("refresh:2;url=p_3.php");
?>