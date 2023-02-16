<?php 
    session_start();
    require_once 'connect.php';
     //เงื่อนตรวจสอบการส่ง method get parameter no 
  
    $email = $_SESSION["email"];
    if($email==""){
      echo '<script>alert("กรุณาเข้าสู่ระบบ")</script>';
      header("refresh:0;url=index   .php");
    }else{
      echo '<script>alert("สวัสดีสมาชิกชมรมทุกท่าน")</script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <?php 
        $id=$_GET['food_id'];
        $sql = "SELECT * FROM food WHERE food_id='$id'";
        $result = mysqli_query($db,$sql);
        while($row=mysqli_fetch_assoc($result)){ ?>
  	<div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="alert alert-primary" role="alert">
           หน้าแสดงรายละเอียดสินค้า <a href="menu.php" class="btn btn-info btn-sm">ย้อนกลับ</a>
          </div>
        </div>
        
       <div class="col-12 col-sm-4">
          <img src="vendor/img/<?= $row['food_picture'];?>" width="100%">
      </div>
       <div class="col-12 col-sm-8">
       	
         <h4> <?= $row['food_name'];?> </h4>
          <font color="red"> ราคา 
          <?= number_format($row['food_price'],2);?>
           บาท 
         </font>
 		<br>
         <b>รายละเอียดสินค้า</b> <br>
         <!-- <?= $row['product_detail'];?> -->
 
          </div> <!-- //col -->
          <br><br>
        </div>
      </div>
    </div>
    <?php } ?>
  </body>
</html>
