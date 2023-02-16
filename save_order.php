<?php
	session_start();
    include("connect.php");
    print_r($_SESSION); 
	$total=0;
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$sql = "select * from food where food_id=$id"; 
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['food_price']*$qty;
		$total += $sum;
	}   
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
    // POST
	$name = $_POST["name"];                                  
	$email = $_POST["email"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$dttm = Date("Y-m-d G:i:s");
	$status = '1';

	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($db, "BEGIN"); 
	$sql1	= "INSERT INTO order_head values(null, '$dttm', '$name', '$address', '$email', '$phone', '$qty', '$total' , '$status')";
	$query1	= mysqli_query($db, $sql1);
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "select max(o_id) as o_id from order_head where o_name='$name' and o_email='$email' and o_dttm='$dttm' ";
	$query2	= mysqli_query($db, $sql2);
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$sql3	= "select * from food where food_id=$id";
		$query3	= mysqli_query($db, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['food_price']*$qty;
		
		$sql4	= "insert into order_detail values(null, '$o_id', '$id', '$qty', '$total')";
		$query4	= mysqli_query($db, $sql4); 
	}
	
	if($query1 && $query4){
		mysqli_query($db, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($db, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='index.php';
</script>
</body>
</html>