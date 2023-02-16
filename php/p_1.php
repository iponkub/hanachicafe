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
            <a href="p_1.php" class="list-group-item list-group-item-action active">รายการอาหาร  </a>
            <a href="p_2.php" class="list-group-item list-group-item-action">ออเดอร์</a>
            <a href="p_3.php" class="list-group-item list-group-item-action">สถานะอาหาร</a>
            <a href="p_4.php" class="list-group-item list-group-item-action">การจัดส่ง</a>
            <a href="p_5.php" class="list-group-item list-group-item-action">ประวัติการถูกสั่งซื้อ</a>
          </div>
        </div>
        <div class="col-md-10">
          <h1>List of Food</h1>
            <br>
            <button type="button" class="btn btn-success btn" data-bs-toggle="modal" data-bs-target="#addmodal">Add ++</button><br><br>
            <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col">food_name</th>
                        <th scope="col">food_type</th>
                        <th scope="col">food_price</th>
                        <th scope="col">food_picture</th>
                        <th scope="col"><center>edit</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM food";
                    $result1 = mysqli_query($db,$sql); 
                    while($row=mysqli_fetch_assoc($result1)) {  
                      $id = $row["food_id"];
                      ?>
                        <tr>
                            <td><?php echo "$id" ?></td>
                            <td><?php echo $row["food_name"]; ?></td>
                            <td><?php echo $row["food_type"]; ?></td>
                            <td><?php echo $row["food_price"]; ?></td>
                            <td><?php echo $row["food_picture"]; ?></td>
                            <td align="center" width="150px">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                              <button type="button" class="btn btn-warning btn-sm"><a href="r_edit.php?food_id=<?php echo $id ?>" class="text-black">Edit</a></button>
                              <button type="button" class="btn btn-danger btn-sm"><a href="r_del.php?food_id=<?php echo $id ?>" class="text-light">Delete</a></button>
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

<!-- Add-Modals -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="r_add.php" class="row g-3" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">::: เพิ่มรายการอาหาร</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label class="text-secondary">ชื่ออาหาร</label>
            <input type="text" name="food_name" class="form-control">
        </div>
        <div class="col-md-12">
                    <label class="text-secondary">หมวดหมู่อาหาร</label>
                    <select class="form-select" aria-label="" name="food_type">
                    <option selected>Open this select menu</option>
                        <?php 
                        $sql1 = "SELECT * FROM food_type";
                        $result1 = mysqli_query($db,$sql1);
                        while($rows=mysqli_fetch_assoc($result1)) { 
                            $type_name = $rows['type_name'];
                        ?>
                         <?php
                        //selected option
                        if(!empty($food_type) && $food_type == $type_name){
                        // selected option
                        ?>
                        <option value="<?php echo $type_name; ?>" selected><?php echo $type_name; ?> </option>
                        <?php 
                        continue;
                        }?>
                        <option value="<?php echo $type_name; ?>" ><?php echo $type_name; ?> </option>
                        <?php } ?>
                    </select>
        </div>
        <div class="col-md-12">
            <label class="text-secondary">ราคาอาหาร</label>
            <input type="text" name="food_price" class="form-control">
        </div>
        <div class="col-md-12">
            <label class="text-secondary">รูปภาพอาหาร</label>
            <input type="file" name="food_picture" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Submit </button>
      </div>
      </form>

    </div>
  </div>
</div>


<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>