<?php 
    session_start();
    require_once '../connect.php';

    if(isset($_GET['food_id'])) {
        $id=$_GET['food_id'];
        
        $sql = "SELECT * FROM food where food_id='$id'";
        $result= mysqli_query($db,$sql);
    }else{
        echo "<hr> ข้อมูลมีปัญหา :)";
        header('p_1.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เเก้ไขข้อมูลอาหาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <!--  ส่วนการรับข้อมูล -->
    <br><br>
    <div class="container">
    <div class="card">
        <div class="card-header bg-danger text-white">
            ::. การเเก้ไขข้อมูลสมาชิค
        </div>
        <div class="card-body">
            
        <?php while($row=mysqli_fetch_assoc($result)) { 
            $food_id=$row["food_id"];
            $food_name=$row["food_name"];
            $food_type=$row["food_type"];
            $food_price=$row["food_price"];
            $food_picture=$row["food_picture"];
            ?>
            <form method="POST" action="r_edit_save.php" class="row g-3" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label class="text-secondary">ลำดับอาหาร</label>
                    <input type="text" name="food_id" value="<?php echo "$food_id" ?>" class="form-control" disabled>
                </div>
                <div class="col-md-6">
                    <label class="text-secondary">ชื่ออาหาร</label>
                    <input type="text" name="food_name" value="<?php echo "$food_name" ?>" class="form-control">
                </div>
                <div class="col-md-6">
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
                        <?php }} ?>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label class="text-secondary">ราคาอาหาร</label>
                    <input type="text" name="food_price" value="<?php echo "$food_price" ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="text-secondary">รูปอาหาร</label>
                    <input type="file" name="food_picture" value="<?php echo "$food_picture" ?>" class="form-control">
                </div>
                <div class="col-md-12">
                <button type="reset" class="btn btn-outline-danger float-end">ยกเลิก</button>
                    <button type="submit" class="btn btn-outline-success float-end">บันทึก</button>
                </div>
            </form>


        </div>
        <div class="card-footer text-muted">
            ...
        </div>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>