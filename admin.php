<?php
    session_start();
    include("connect.php");  // เรียกใช้ไฟล์ connect.php

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
          <a class="nav-link" href="menu.php">เมนูอาหาร</a>
        </li>
    </ul>
     <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="">ชื่อผู้ใช้งาน : 
            <?php echo $email; ?>
          </a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="logout.php">ออกจากระบบ</a>
        </li>
    </ul>
      
    </div>
  </div>
</nav>

<br>

<!-- Contaier -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
          <div class="list-group">
            <a href="admin.php" class="list-group-item list-group-item-action active" aria-current="true">
              หน้าหลัก
            </a>
            <a href="php/p_1.php" class="list-group-item list-group-item-action">รายการอาหาร </a>
            <a href="php/p_2.php" class="list-group-item list-group-item-action">ออเดอร์</a>
            <a href="php/p_3.php" class="list-group-item list-group-item-action">สถานะอาหาร</a>
            <a href="php/p_4.php" class="list-group-item list-group-item-action">การจัดส่ง</a>
            <a href="php/p_5.php" class="list-group-item list-group-item-action">ประวัติการถูกสั่งซื้อ</a>
          </div>
        </div>
    </div>
</div>


<!-- script -->
</body>
</html>