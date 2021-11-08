<?php
@session_start();
if(empty($_SESSION['aid'])){
    echo "Access denied";
    exit;
}
echo "ชื่อผู้เข้าใช้งาน : ";
echo $_SESSION['aname']."<br>";
echo "<br>";

 include("connectdb.php");
        
        $id = $_GET['id'] ;
    
        $sql = "SELECT * FROM `product` WHERE p_id='{$id}' ";
        $rs = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($rs);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แก้ไขข้อมูล</title>
</head>

<body>
    <h1>แก้ไขข้อมูลสินค้า</h1>
    <form method="post" action="" enctype="multipart/form-data">
    
        ชื่อสินค้า <input type="text" name="p_name" required value="<?=$data['p_name'];?>"> <br>
        รายละเอียดสินค้า <textarea type="text" name="p_detail" required row="3" cols="30"><?=$data['p_detail'];?> </textarea> <br>
        ประเภทสินค้า ประเภท <select name="select" id="select">
	  <option value="1">แหวน</option>
	  <option value="2">สร้อย</option>
	  <option value="3">สร้อยข้อมือ</option></select> <br>
        ราคา <input type="text" name="p_price" required value="<?=$data['p_price'];?>"> <br>
        รูปสินค้า <input type="file" name="p_picture"> <br>
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
    
    
    
    if(empty($_FILES['p_picture']['name'])){
      
    $sql = "UPDATE `product` SET `p_name` = '{$p_name}', `p_detail` = '{$p_detail}', `p_price` = '{$p_price}', `p_type` = '{$p_type}' WHERE `product`.`p_id` = {$id};";

    mysqli_query($conn, $sql) or die ("แก้ไขข้อมูลไม่สำเร็จ");
    
    } else {
        $path = $_FILES['p_picture']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);   
        copy($_FILES['p_picture']['tmp_name'], "images/".$path);
        
          $sql = "UPDATE `product` SET `p_name` = '{$p_name}', `p_detail` = '{$p_detail}', `p_price` = '{$p_price}', `p_picture` = '{$path}', `p_type` = '{$p_type}' WHERE `product`.`p_id` = {$id};";
        
        mysqli_query($conn, $sql) or die ("แก้ไขข้อมูลไม่สำเร็จ");
    }    
    
    
    echo "<script>";
    echo "alert('แก้ไขข้อมูลสำเร็จ');";
    echo "window.location='admin_shop.php';";
    echo "</script>";
    
    
    
}    
    ?>
</body>
</html>