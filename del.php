<?php
@session_start();
if(empty($_SESSION['aid'])){
	echo "Access denied";
	exit;
}
?>
<meta charset="utf-8">

<?php

if(isset($_GET['id'])){
    include_once("connectdb.php");
    
    $sql = "DELETE FROM `product` WHERE `product`.`p_id` = '{$_GET['id']}'";
    mysqli_query($conn, $sql) or die ("ไม่สามารถลบข้อมูลได้");
    
    @unlink("imges/".$_GET['id'].".".$_GET['ext']);
    
    echo "<script>";
    echo "alert('ลบข้อมูลสำเร็จ');";
    echo "window.location='manage.php';";
    echo "</script>";
}

?>