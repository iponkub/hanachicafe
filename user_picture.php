<?php
  session_start();
  require_once 'connect.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
    <!-- <div class="container-fluid"> -->
      <a class="navbar-brand" href="#">Hana-Cafe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a>
          </li>
          <li class="nav-item">
            
          <a class="nav-link" aria-current="page" href="cart.php?id=<?php echo "$id";?>&act=view">ตะกร้าสินค้า</a>
          </li>
      </ul>
        <ul class="navbar-nav ms-auto">
        <?php
          // ค้นหาผู้ใช้งาน
          if(isset($_SESSION["email"])){
            $cus_email=$_SESSION["email"];
            $sql="select * from member where email='$cus_email'";
            $result=mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($result)){
              $user_name=$row["name"];
              $user_picture=$row["user_picture"];
      } ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button"
        data-bs-toggle="dropdown">ชื่อผู้ใช้งาน :
        <?php echo $user_name; ?></a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="user_picture.php">
            <img src="vendor/img/<?php echo $user_picture; ?>" width="200" height="160" class="rounded-circle">
            <br><br>เปลี่ยนรูปภาพ<br>
          </a></li>

          <li class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="user_edit.php">แก้ไขข้อมูลส่วนตัว</a></li>
          <li class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
        </ul>
      </li>

          <?php }else{ ?>

          <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">เข้าสู่ระบบ</a>
          </li>

          <?php } ?>

    </ul>

      </div>
    </div>
  </nav>
  </header>
<br>

<div class="container">
    <div class="card">
            <div class="card-header bg-info text-white">
                <b>เปลี่ยนรูปภาพประจำตัว</b>
            </div>
            <div class="card-body">
                <center>
                    <img src="vendor/img/<?php echo $user_picture; ?>" width="600">
                <br><br>        
                </center>
            </div>
    </div>

<br><br>

<form method="POST" action="user_picture_save.php" enctype="multipart/form-data">

<div class="input-group mb-3">
    <input type="file" name="user_picture" class="form-control">
    <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04"> Upload File </button> 
</div>

</form>

</div>
</body>
</html>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>