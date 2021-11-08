<?php
	@session_start();

	unset($_SESSION['sid']) ;
	unset($_SESSION['sname']) ;
	unset($_SESSION['sprice']) ;
	unset($_SESSION['sdetail']) ;
	unset($_SESSION['spicture']) ;
	unset($_SESSION['sitem']) ;
    unset($pid);
    unset($sum[$pid]);
	


    

echo "กำลังกลับหน้าหลัก กรุณารอสักครู่....";
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=shop.php\">";
	//header("Location: shop.php");
?>
<meta charset="utf-8">