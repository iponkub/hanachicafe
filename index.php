<?php 
    session_start();
    require_once 'connect.php';

    if(isset($_SESSION['email']) == TRUE){
      // รับชื่อผู้ใช้งานที่ส่งมา
      $email=$_SESSION['email'];
      $id=$_SESSION['UserID'];

      // ค้นหาชื่อผูใช้งาน
      $sql="SELECT * FROM member WHERE email='".$email."'";
      $result=mysqli_query($db,$sql);
      $row=mysqli_fetch_assoc($result);
      $email=$row["email"];
    }
?>

<h1tml>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hana-Cafe</title>
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/button.css">
    <link rel="stylesheet" href="vendor/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="vendor/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
        <style>
          /* Make the image fully responsive */
          .hello{
            width: 100%;
            height: 100%;
          }
        </style>
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
            <a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="cart.php?id=<?php echo "$id";?>&act=view">ตะกร้าสินค้า</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="order.php">เช็คสถานะสินค้า</a>
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
            <div class="hello">
              <img src="vendor/img/<?php echo $user_picture; ?>" width="100%" height="100%" class="rounded-circle">
            </div>
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
      <form method="POST" action="register_chk.php" class="row g-3">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">::: User Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label class="text-secondary">อีเมลล์</label>
            <input type="text" name="email" class="form-control" !important>
        </div>
        <div class="row">
        <div class="col-md-6">
            <label class="text-secondary">ชื่อ</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="text-secondary">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control">
        </div>
        </div>
        <div class="col-md-12">
            <label class="text-secondary">เบอร์โทร</label>
            <input type="tel" name="tel" class="form-control">
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
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img src="vendor/img/nav.jpg" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item c-item">
      <img src="vendor/img/blank.png" class="d-block w-100 c-img" alt="...">
    </div>
    <div class="carousel-item c-item">
      <img src="vendor/img/blank.png" class="d-block w-100 c-img" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  <div class="container">
  <br><br>
  <h1>Hana-Cafe ยินดีต้อนรับ</h1>
      <p>เลือกหยิบได้ตามสบายขอบคุณค่ะ :)</p>
      <div class="frame">
      <button onclick="location.href='menu.php';" class="custom-btn btn-5" type="button"><span>เมนูทั้งหมด</span></button>
      </div>
        <!-- Card 1 -->
  <div class="container-fluid my-3">
        <h5 class="text-center display-3 mb-5 text-danger">Me<span class="text-dark">Nu</span></h5>
          <div class="row">
              <div class="col-10 m-auto">
                  <div class="owl-carousel owl-theme">
                      <div class="item mb-4">
                          <div class="card border-0 shadow">
                              <img src="vendor/img/1111.jpg" alt="" class="card-img-top">
                              <div class="card-body">
                                  <div class="card-title text-center">
                                      <h4>Recommanded</h4>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="item">
                          <div class="card border-0 shadow">
                              <img src="vendor/img/11111.jpg" alt="" class="card-img-top">
                              <div class="card-body">
                                  <div class="card-title text-center">
                                      <h4>Recommanded</h4>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="card border-0 shadow">
                              <img src="vendor/img/4.jpg" alt="" class="card-img-top">
                              <div class="card-body">
                                  <div class="card-title text-center">
                                      <h4>Recommanded</h4>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
      <br><br>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
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