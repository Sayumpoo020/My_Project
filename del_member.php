<?php
@session_start();
if(empty($_SESSION['aid'])){
	echo "Access denied";
	exit;
}
?>
<meta charset="utf-8">

<?php

if(isset($_GET['a'])){
    include_once("connectdb.php");
    
    $sql = "DELETE FROM `member` WHERE `member`.`Id_m` = '{$_GET['a']}'" ;
    mysqli_query($conn, $sql) or die ("ไม่สามารถลบข้อมูลได้");
    
  
    
    echo "<script>";
    echo "alert('ลบข้อมูลสำเร็จ');";
    echo "window.location='Showmember.php';";
    echo "</script>";
}

?>