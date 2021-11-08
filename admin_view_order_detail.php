<?php
@session_start();
if(empty($_SESSION['aid'])){
    echo "กรุณาเข้าสู่ระบบ";
    exit;
}
include("connectdb.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายละเอียดใบสั่งซื้อ</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>

<body>
<h1 align="center">รายละเอียดใบสั่งซื้อ เลขที่ <?=$_GET['a'];?></h1>
    <a href="admin_view_order.php"><button type="button" class="btn btn-primary"><div class="b">ย้อนกลับ</div></button></a>
    <a href="admin_shop.php"><button type="button" class="btn btn-primary"><div class="b">กลับไปหน้าหลัก</div></button></a>
   
     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ที่</th>
      <th scope="col">สินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคา/ชิ้น</th>
        <th scope="col">รวม (บาท)</th>    
    </tr>
  </thead>
         <?php
	
	$sql = "SELECT  *  FROM  orders_detail
INNER JOIN product ON orders_detail.pid = product.p_id
WHERE orders_detail.oid = '".$_GET['a']."'  ";
	$rs = mysqli_query($conn, $sql) ;
	$i = 0;
	while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
		$i++;
		$sum = $data['p_price'] * $data['item'] ;
		@$total += $sum;
?>
  <tbody>
    <tr>
      <th scope="row"><?=$i;?></th>
      <td><img src="images/<?=$data['p_picture'];?>" width="80"> <br>
	รหัสสินค้า: <?=@$data['p_id'];?> <br>
	ชื่อสินค้า: <?=$data['p_name'];?></td>
      <td><?=$data['item'];?></td>
      <td><?=number_format($data['p_price'],0);?></td>
    <td><?=number_format($sum,0);?></td>
    </tr>
    
      <?php } ?>
    <tr>
      <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>รวมทั้งสิ้น</b></td>
    <td><b><?=number_format($total,0);?></b></td>
    </tr>
  </tbody>
</table>
    
    
<h2 align="center">ที่อยู่จัดส่ง</h2>    
    <br>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">รหัสลูกค้า</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">เบอร์โทร</th>
        <th scope="col">ที่อยู่</th>
        <th scope="col">Email</th>
    </tr>
  </thead>
        <?php
        
            
            
            $sql1 = "SELECT * FROM `member` INNER JOIN `orders` ON member.Id_m = orders.member_id WHERE `oid` = '".$_GET['a']."' ";
            $rs = mysqli_query($conn, $sql1) ;
	           while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
        ?>
  <tbody>
    <tr>
      <th scope="row"><?=$data['Id_m'];?></th>
      <td><?=$data['fname'];?></td>
      <td><?=$data['lname'];?></td>
      <td><?=$data['tel'];?></td>
        <td><?=$data['address'];?></td>
        <td><?=$data['email'];?></td>
    </tr>
      <?php } ?>
      
    
</tbody>
</table>
      
</body>
</html>