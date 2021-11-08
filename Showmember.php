<?php
@session_start();
if(empty($_SESSION['aid'])){
    echo "กรุณาเข้าสู่ระบบ";
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายชื่อสมาชิก</title>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <blockquote>
<h1 align="center">รายชื่อสมาชิก</h1>
        <a href="admin_shop.php"><button type="button" class="btn btn-primary"><div class="b">กลับไปหน้าหลัก</div></button></a>
        <br>
        <br>
    <table class="table">
  <thead class="thead-dark">
  <tr>
    <td scope="col">รหัสลูกค้า</td>
    <td scope="col">ชื่อ</td>
    <td scope="col">นามสกุล</td>
    <td scope="col">เบอร์โทร</td>  
    <td scope="col">ที่อยู่</td>
    <td scope="col">Email</td>
    <td scope="col">&nbsp;</td>
  </tr>
  </thead>
  <?php
    
	include("connectdb.php");
	$sql = "SELECT * FROM `member`";
	$rs = mysqli_query($conn, $sql) ;
	while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
         
        
?>
<tbody>
  <tr scope="row">
    <td><?=$data['Id_m'];?></td>
    <td><?=$data['fname'];?></td>
    <td><?=$data['lname'];?></td>
    <td><?=$data['tel'];?> </td>  
    <td><?=$data['address'];?></td>
    <td><?=$data['email'];?></td>
    <td> 
        <a href="del_member.php?a=<?=$data['Id_m'];?>">ลบ</a></td>
            </td>
  </tr>
  
  <?php  }  ?>
        
        
  <tbody>
</table>
        <hr>
        <blockquote>
          
    
</body>
</html>