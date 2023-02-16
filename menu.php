<?php 
    session_start();
    require_once 'connect.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hana-Cafe</title>
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/button.css">
    <link rel="stylesheet" href="vendor/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="vendor/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vendor/card.css">
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
    <!-- <div class="container-fluid"> -->
      <a class="navbar-brand" href="#">Hanachi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
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

          <?php } ?>

    </ul>

      </div>
    </div>
  </nav>
  </header>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="login_chk.php" class="row g-3">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">::: User Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label class="text-secondary">อีเมลล์</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="col-md-12">
            <label class="text-secondary">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control">
        </div>
        <hr>    
            <p>ยังไม่ได้สมัครสมัครต้องนี้ : <a href="#" data-bs-target="#registerModal" data-bs-toggle="modal">Register</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Login </button>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="regsiterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="login_chk.php" class="row g-3">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">::: User Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label class="text-secondary">อีเมลล์</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="col-md-12">
            <label class="text-secondary">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control">
        </div>
        <hr>    
            <p>ต้องการเข้าสู่ระบบ : <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal">Login</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Login </button>
      </div>
      </form>

    </div>
  </div>
</div>

</header>

<div class="container">
<br><br>
<h1>Hana-Cafe Menu</h1>
<p>เลือกหยิบได้ตามสบายขอบคุณค่ะ :)</p> 
</div>
<div class="flexbox">
  <?php
    $sql="SELECT * FROM food";
    $result=mysqli_query($db,$sql);
    while($row=mysqli_fetch_assoc($result)){
  ?>
  <div class="food-card" style="background-image:url('vendor/img/<?php echo $row["food_picture"]?>');">
    <div class="food-card-content">
      <div class="heading show">
        <h2><?php echo $row["food_name"]?></h2>
      <div class="shadow"></div>
      </div>
      <div class="heading author show">
        <h5>By <a href="#profile" class="profile">Hanachi-Cafe</a></h5>
      <div class="shadow"></div>
      </div>
      <div class="hover-content">
      <div class="food-card-properties">
        <div><i class="fa fa-clock-o"></i><p>5 min</p></div>
        <div><i class="fa fa-star" style="color:yellow"></i><p>4.2(121 votes)</p></div>
        <div><i class="fa fa-money"></i><p><?php echo $row["food_price"]?></p></div>
      </div>
        <hr>
        <div class="content"><div class="show-less">
        <!-- <a href="product_detail.php?food_id=<?=$row['food_id'];?>" class="view-more">View More-></a> -->
        <a href="cart.php?id=<?php echo $row["food_id"];?>&act=add" class="btn btn-success float-end">เพิ่มไปยังตะกร้า</a>
        </div>
      </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
</body>
</h1tml>    