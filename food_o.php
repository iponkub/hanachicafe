    <?php
    session_start();
    include("../connect.php");  // เรียกใช้ไฟล์ connect.php

    // รับชื่อผู้ใช้งานที่ส่งมา
    $email=$_SESSION['email'];
    $user_id=$_SESSION['UserID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">HANACHI-CAFE : </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../menu.php">เมนูอาหาร</a>
        </li>
    </ul>
     <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="">ชื่อผู้ใช้งาน :
          <?php echo $email; ?> 
          </a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
        </li>
    </ul>
      
    </div>
  </div>
</nav>

<br>

<!-- container-fluid -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
          <div class="list-group">
            <a href="../admin.php" class="list-group-item list-group-item-action" aria-current="true">
              หน้าหลัก
            </a>
            <a href="p_1.php" class="list-group-item list-group-item-action">รายการอาหาร</a>
            <a href="p_2.php" class="list-group-item list-group-item-action">ออเดอร์</a>
            <a href="p_3.php" class="list-group-item list-group-item-action">สถานะอาหาร</a>
            <a href="p" class="list-group-item list-group-item-action">ประวัติการถูกสั่งซื้อ</a>
          </div>
        </div>
        <div class="col-md-10">
          <h1>List of Food</h1>
            <br>
            <button type="button" class="btn btn-primary" onclick="history.back();">Back</button><br><br>
            <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col">รหัสออเดอร์</th>
                        <th scope="col">อาหาร</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $o_id=$_GET['o_id'];
                    $sql = "SELECT * FROM order_detail WHERE o_id='$o_id'";
                    $result1 = mysqli_query($db,$sql); 
                    while($row=mysqli_fetch_assoc($result1)) {  
                      $id = $row["d_id"];
                      $p_id = $row["p_id"];
                      $d_qty = $row["d_qty"];
                      $total = $row["d_subtotal"]
                      ?>
                        <tr>
                            <td><?php echo "$id" ?></td>
                            <td><?php echo $row["o_id"]; ?></td>
                            <?php 
                            $food = "SELECT * FROM food WHERE food_id='$p_id'";
                            $conn = mysqli_query($db,$food);
                            while($row=mysqli_fetch_assoc($conn)) {
                                $food_name = $row["food_name"]
                            ?>
                            <td><?php echo $food_name; ?></td>
                        <?php } ?>
                            <td><?php echo $d_qty; ?></td>
                            <td><?php echo $total; ?></td>
                            </td>
                            
                    <?php } ?>    

                        </tr>
                        
                
                </tbody>
            </table> 
            </div>
        </div>
    </div>
</div>


<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>