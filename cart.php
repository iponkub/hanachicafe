<?php
    session_start();
    require_once 'connect.php';

    $id = $_GET['id'];
    $act = $_GET['act'];
     
    if($act=='add' && !empty($id)) {
        if(isset($_SESSION['cart'][$id]))
		{
			$_SESSION['cart'][$id]++;
		}
		else
		{
			$_SESSION['cart'][$id]=1;
		}
    }

    if($act=='remove' && !empty($id))  //ยกเลิกการสั่งซื้อ
	{
        $_SESSION['cart'][$id]--;
        if($_SESSION['cart'][$id] == 0){
            unset($_SESSION['cart'][$id]);
        }
	}

    

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $id=>$amount)
		{
			$_SESSION['cart'][$id]=$amount;
		}
	}

    if($act=='view')
	{

	}
    // print_r($_SESSION);
    // session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<title>Shopping Cart</title>
<link rel="stylesheet" href="sp.css">
</head>
<body>
	<div class="container d-flex align-items-center justify-content-center">
	<div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
		<h4 class="card-title">Shopping Cart</h4>
		<form id="frmcart" name="frmcart" method="POST" action="cart.php?id=<?php echo $id ?>&act=update">
			<div class="table-responsive">
				<table class="table">
					<thead>
					<tr>
					<td>สินค้า</td>
					<td>ราคา</td>
					<td align="center">จำนวน</td>
					<td align="center">รวม(บาท)</td>
					<td align="center">เพิ่ม</td>
					<td align="center">ลบ</td>
					</tr>
					</thead>
				
	
	
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$sql = "select * from food where food_id=$id";
		$query = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['food_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<tbody>";
		echo "<td width='334'>" . $row["food_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["food_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$id]' value='$qty' size='2' min='1' /></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?id=$id&act=add'>เพิ่ม</a></td>";
        echo "<td width='46' align='center'><a href='cart.php?id=$id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td colspan='2' align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><button onclick="location.href='index.php';" class="btn btn-primary" type="button"><span>ย้อนหลับ</span></button></td>
<td colspan="5" align="right">
    <!-- <input type="submit" name="button" id="button" value="ปรับปรุง" class="btn btn-primary" /> -->
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" class="btn btn-danger" />
</td>
</tr>
</table>
</div>
</form>

</div>
</div>

</body>
</html>
