<?php
@session_start();
if(empty($_SESSION['aid'])){
    echo "Access denied";
    exit;
}
echo "ชื่อผู้เข้าใช้งาน : ";
echo $_SESSION['aname']."<br>";
echo "<br>";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มสินค้า</title>
</head>

<body>
    <h1>เพิ่มสินค้า</h1>
<?
    $p_picture =$_POST['p_picture'];
?>    
    <form method="post" action="" enctype="multipart/form-data">
    
        ชื่อสินค้า <input type="text" name="p_name" required> <br>
        รายละเอียดสินค้า <textarea type="text" name="p_detail" required row="3" cols="30"></textarea> <br>
        ประเภท <select name="select" id="select">
	  <option value="1">แหวน</option>
	  <option value="2">สร้อย</option>
	  <option value="3">สร้อยข้อมือ</option>
      &nbsp;
      
  </select> <br>
        ราคา <input type="text" name="p_price" required> <br>
        รูปสินค้า <input type="file" name="p_picture" required> <br>   
        <input type="submit" name="Submit" value="บันทึกข้อมูล"> 
    </form>
    
<?php
    
if(isset($_POST['Submit'])){    
    include_once("connectdb.php");
    
    $p_name = $_POST['p_name'];
    $p_detail = $_POST['p_detail'];
    $p_type = $_POST['select'];
    $p_price =$_POST['p_price'];
    $p_picture =$_POST['p_picture'];
    
    $path = $_FILES['p_picture']['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
      
    $sql = "INSERT INTO `product` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_picture`, `p_type`) VALUES (NULL, '{$p_name}', '{$p_detail}', '{$p_price}', '{$path}', '{$p_type}');";
    //var_dump($sql); exit;
    mysqli_query($conn, $sql) or die ("เพิ่มข้อมูลไม่สำเร็จ");
    
     $bid = mysqli_insert_id($conn);
        
    copy($_FILES['p_picture']['tmp_name'], "images/".$path);
    
    echo "<script>";
    echo "alert('เพิ่มข้อมูลสินค้าสำเร็จ');";
    echo "window.location='admin_shop.php';";
    echo "</script>";
    
}    
    ?>
</body>
</html>