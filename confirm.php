<?php
	session_start();
    include("connect.php");
    $id = $_SESSION['UserID'];
    $name = $_SESSION['User'];
    $sql1 = "SELECT * FROM member WHERE id='$id'";
    $result1 = mysqli_query($db,$sql1);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
    
    <h3><strong>สั่งซื้อสินค้า</strong></h3>
<br>
<form id="frmcart" name="frmcart" method="POST" action="save_order.php">
  <table class="table table-hover table-bordered">
    <thead class="table-light">
    <tr>
      <td >สินค้า</td>
      <td align="center" >ราคา</td>
      <td align="center">จำนวน</td>
      <td align="center">รวม/รายการ</td>
    </tr>
    </thead>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$sql = "select * from food where food_id=$id";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['food_price']*$qty;
		$total += $sum;
    echo "<tbody>";
    echo "<tr>";
    echo "<td>" . $row["food_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['food_price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' class='table-active'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
    echo "</tbody>";
?>
</table>
<br><br><br><br><br>


<div class="container">
    <div class="card">
            <div class="card-header bg-danger text-white">
                <b>รายละเอียดในการติดต่อ</b>
            </div>
            <div class="card-body">
                <?php while($row1=mysqli_fetch_array($result1)) { ?>
                    <div class="row">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label">อีเมลล์</label>
                        <input class="form-control" name="email" type="email" value="<?php echo $row1['email']; ?>" required/>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label">ชื่อ-นามสกุล</label>
                        <input class="form-control" name="name" type="text" value="<?php echo $name; ?>" required/>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label">ที่อยู่</label>
                        <textarea class="form-control" name="address" cols="30" rows="3" id="address" value="<?php echo $row1['address']; ?>" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label">เบอร์ติดต่อ</label>
                        <input class="form-control" name="phone" type="text"  value="<?php echo $row1['tel']; ?>" required />
                    </div>
                    </div>
                    <br>
                        <input type="submit" name="Submit2" value="สั่งซื้อ" class="btn btn-primary" style="float:right;width:100px"/>
                    
                    </div>
                <?php } ?>
            </div>
            <div class="card-footer text-muted">
                
            </div>
    </div>
</div>
<br><br>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>