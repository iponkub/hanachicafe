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

    <div class="collapse navbarcollapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-a-uto mb-2 mb-lg-0">
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
            <a href="p_1.php" class="list-group-item list-group-item-action">รายการอาหาร  </a>
            <a href="p_2.php" class="list-group-item list-group-item-action">ออเดอร์</a>
            <a href="p_3.php" class="list-group-item list-group-item-action">สถานะอาหาร</a>
            <a href="p_4.php" class="list-group-item list-group-item-action active">การจัดส่ง</a>
            <a href="p_5.php" class="list-group-item list-group-item-action">ประวัติการถูกสั่งซื้อ</a>
          </div>
        </div>
        <div class="col-md-10">
          <h1>Delivery</h1>
            <br>
            <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col">date</th>
                        <th scope="col">name</th>
                        <th scope="col">address</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">qty</th>
                        <th scope="col">total</th>
                        <th scope="col">status</th>   
                        <th scope="col"><center>order</center></th>
                        <th scope="col"><center>status</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM order_head WHERE status='3'";
                    $result1 = mysqli_query($db,$sql); 
                    while($row=mysqli_fetch_assoc($result1)) {  
                      $id = $row["o_id"];
                      $stat = $row["status"];
                      ?>
                        <tr>
                            <td><?php echo "$id" ?></td>
                            <td><?php echo $row["o_dttm"]; ?></td>
                            <td><?php echo $row["o_name"]; ?></td>
                            <td><?php echo $row["o_addr"]; ?></td>
                            <td><?php echo $row["o_email"]; ?></td>
                            <td><?php echo $row["o_phone"]; ?></td>
                            <td><?php echo $row["o_qty"]; ?></td>
                            <td><?php echo $row["o_total"]; ?></td>
                            <td><?php if($stat == "3"){ 
                                    echo "กำลังจัดส่ง";}?></td>
                            <td align="center" width="80px">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                              <button type="button" class="btn btn-warning btn-sm "><a href="o_food.php?o_id=<?php echo $id ?>" class="text-light">Food</a></button>
                            </div>
                            <td align="center" width="150px">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary btn-sm " name="end"><a href="o_status_3.php?o_id=<?php echo $id ?>" class="text-light">Complete</a></button>
                            </div>
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