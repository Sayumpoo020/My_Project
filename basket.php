<?php
    
	@session_start();
if(empty($_SESSION['aid'])){
    echo "กรุณาเข้าสู่ระบบ";
    exit;
    
    
}
	include("connectdb.php");
	$sql = "select * from product where p_id='".@$_GET['id']."' ";
	$rs = mysqli_query($conn, $sql) ;
	$data = mysqli_fetch_array($rs, MYSQLI_BOTH);
	@$id = $_GET['id'] ;
	
	if(isset($_GET['id'])) {
		$_SESSION['sid'][$id] = $data['p_id'];
		$_SESSION['sname'][$id] = $data['p_name'];
		$_SESSION['sprice'][$id] = $data['p_price'];
		$_SESSION['sdetail'][$id] = $data['p_detail'];
		$_SESSION['spicture'][$id] = $data['p_picture'];
		@$_SESSION['sitem'][$id]++;
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ตะกร้าสินค้า</title>
    
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <blockquote>
      <h2 align="center">ตะกร้าสินค้า</h2>
  
    <a href="shop.php" class="btn btn-primary">กลับไปเลือกสินค้า</a>  
    <a href="clear.php" class="btn btn-warning">ลบสินค้าทั้งหมด</a>
    <a href="record.php" class="btn btn-success">สั่งซื้อสินค้า</a> 
<br>
        <br>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th width="5%">ที่</th>
		<th width="19%">รูปสินค้า</th>
		<th width="24%">ชื่อสินค้า</th>
		<th width="14%">ราคา/ชิ้น</th>
		<th width="15%">จำนวน (ชิ้น)</th>
		<th width="14%">รวม</th>
		<th width="9%">&nbsp;</th>
    </tr>
     </thead> 
<?php
if(!empty($_SESSION['sid'])) {
	foreach($_SESSION['sid'] as $pid) {
		@$i++;
		$sum[$pid] = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid] ;
		@$total += $sum[$pid] ;
?>
      <tr>
		<td><?=$i;?></td>
		<td><img src="images/<?=$_SESSION['spicture'][$pid];?>" width="120"></td>
		<td><?=$_SESSION['sname'][$pid];?></td>
		<td><?=number_format($_SESSION['sprice'][$pid],0);?></td>
		<td> <?=$_SESSION['sitem'][$pid];?></td>
		<td><?=number_format($sum[$pid],0);?></td>
		<td><a href="clear2.php?id=<?=$pid;?>" class="btn btn-danger">ลบ</a></td>
	</tr>
<?php } // end foreach ?>
      <tr>
		<td colspan="5" align="right"><strong>รวมทั้งสิ้น</strong> &nbsp; </td>
		<td><strong><?=number_format($total,0);?></strong></td>
		<td><strong>บาท</strong></td>
	</tr>
<?php 
} else {
?>
	<tr>
		<td colspan="7" height="50" align="center">ไม่มีสินค้าในตะกร้า</td>
	</tr>
<?php } // end if ?>
  
</table>
        </blockquote>
    
</body>
</html>