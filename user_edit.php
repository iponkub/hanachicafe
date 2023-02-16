<?php 
    session_start();
    require_once 'connect.php';
    // print_r($_SESSION);
    $id = $_SESSION['UserID'];
    $sql = "SELECT * FROM member WHERE id='$id'";
    $result = mysqli_query($db,$sql);
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>

    <!--  NAVBAR เมนูด้านบน -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">

            <a class="navbar-brand" href="#">iTCVC Food Online : </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="web.php" aria-current="page">
                        หน้าหลัก <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">รายการอาหาร</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">สมัครสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
                    </li>
                </ul>

            </div>
    </div>
    </nav>
    
        
    <!--  ส่วนการรับข้อมูล -->
    <br><br>
    <div class="container">
    <div class="card">
        <div class="card-header bg-danger text-white">
            ::. การเเก้ไขข้อมูลสมาชิค
        </div>
        <div class="card-body">
            
        <?php while($row=mysqli_fetch_assoc($result)) { 
            $email=$row["email"];
            $name=$row["name"];
            $password=$row["password"];
            $tel=$row["tel"];
            ?>
            <form method="POST" action="user_edit_save.php" class="row g-3">
                <div class="col-md-12">
                    <label class="text-secondary">อีเมลล์</label>
                    <input type="email" name="email" value="<?php echo "$email" ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="text-secondary">ชื่อ</label>
                    <input type="text" name="name" value="<?php echo "$name" ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="text-secondary">รหัสผ่าน</label>
                    <input type="password" name="password" value="<?php echo "$password" ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="text-secondary">เบอร์</label>
                    <input type="tel" name="tel" value="<?php echo "$tel" ?>" class="form-control">
                </div>
                <div class="col-md-12">
                <button type="reset" class="btn btn-outline-danger float-end">ยกเลิก</button>
                    <button type="submit" class="btn btn-outline-success float-end">บันทึก</button>
                </div>
            </form>
            <?php } ?> 
        </div>
        <div class="card-footer text-muted">
            ...
        </div>
    </div>
    </div>
    

    <!-- Style -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>
 