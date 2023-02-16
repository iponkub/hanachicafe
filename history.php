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

    $email = $_SESSION["email"];
    $name = $_SESSION["User"];
    if($email==""){
      echo '<script>alert("กรุณาเข้าสู่ระบบ")</script>';
      header("refresh:0;url=index.php");
    }else{
      echo '<script>alert("สวัสดีสมาชิกชมรมทุกท่าน")</script>';
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
      <a class="navbar-brand" href="#">Hana-Cafe</a>
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

</header>

<!-- container-fluid -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <br>
          <h1>Order</h1>
      <div class="frame">
      <button onclick="location.href='order.php';" class="custom-btn btn-7" type="button"><span>ย้อนหลับ</span></button>
      </div>
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
                        <!-- <th scope="col"><center>recipe</center></th>  -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM order_head WHERE o_email='$email' and status='3' or status='5' or status='6'";
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
                            <td><?php if($stat == "1"){ 
                                echo "รอการอนุมัติ";} 
                                if($stat == "2"){
                                    echo "กำลังจัดเตรียมอาหาร";}
                                if($stat == "3"){
                                    echo "รับที่ร้าน";}
                                if($stat == "4"){
                                    echo "กำลังจัดส่ง";}
                                if($stat == "5"){
                                    echo "ส่งลูกค้าเสร็จสิ้น";}
                                if($stat == "6"){
                                    echo "ยกเลิกออร์เดอร์";}?></td>
                            <td align="center" width="80px">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                              <button type="button" class="btn btn-warning btn-sm "><a href="o_food.php?o_id=<?php echo $id ?>" class="text-light">Food</a></button>
                            </div>
                            <!-- <td align="center" width="150px">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <!-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#statusmodal">Status</button> -->
                            <!-- <button type="button" class="btn btn-success btn-sm " name="accpet"><a href="o_status.php?o_id=<?php echo $id ?>" class="text-light">Accpet</a></button>
                            <button type="button" class="btn btn-danger btn-sm " name=""><a href="o_del.php?o_id=<?php echo $id ?>" class="text-light">Deline</a></button> -->
                            
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

<div class="container"></div>
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