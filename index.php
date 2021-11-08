<?php

	include("connectdb.php");

?>
<!doctype html>
<html>
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<head>
<meta charset="utf-8">
<title>รายการสินค้า</title>
   
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <style>
    body {
        background-color: #DBDBDB;
        }
        .a {
           
             font-size: 30px ;
             font-weight: bold ;
             color: white;
         }
        .b {
             
             font-size: 17px;
             font-weight: bold;
             color: white;
             
         }
    </style>
    
</head>  

<body>
   
    <?php
	$sql2 = "select  *  from product_type ";
	$rs2 = mysqli_query($conn, $sql2) ;
	while ($data2 = mysqli_fetch_array($rs2, MYSQLI_BOTH)) 
?>
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
       <div class="a">   
      <a class="navbar-brand" href="index.php">
      <img src="t1.png" alt="" width="90" height="50" class="d-inline-block align-text-top">
      Shop.aholice
    </a>
       </div> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
          
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
         &nbsp; 
           &nbsp; 
       <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="b">หมวดหมู่สินค้า</div>
  </button>
           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php
	$sql2 = "select  *  from product_type ";
	$rs2 = mysqli_query($conn, $sql2) ;
	while ($data2 = mysqli_fetch_array($rs2, MYSQLI_BOTH)) {
    ?>

    <a href="index.php?pt=<?=$data2['pt_id'];?>" class="dropdown-item"><?=$data2['pt_name'];?></a>  

    <?php } ?>
               </div>
  
</div>
      </ul>
        
    </div>
          
      
         <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
             
              &nbsp; 
              &nbsp; 
            <li >
          <a href="login.php"><button type="button" class="btn btn-primary"><div class="b">เข้าสู่ระบบ</div></button></a>
          </li >
             
              &nbsp; 
              &nbsp; 
            <li >
          <a href="SignUp.php"><button type="button" class="btn btn-primary"><div class="b">สมัครสมาชิก</div></button></a>
          </li >
          </ul>
  </div>
</nav>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    


<br><br>

<div class="a"><h2 style="background-color:dimgray" align="center"> รายการสินค้าทั้งหมด</h2></div>
<p>

<?php
	@$kw = $_POST['kw'] ;
	@$pt = $_GET['pt'] ;
	if (isset($_GET['pt'])) {
		$s = "and (p_type = '$pt')"; 
	} else {
		$s = "";	
	}
	$sql = "select * from product where ( p_name like '%$kw%' or p_detail like '%$kw%' ) $s ";
	$rs = mysqli_query($conn, $sql) ;
	$i = 0;
	while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
		$i++;
		if( ($i % 3) == 1) {
			echo "<div class='row' align='center' style='width:100%;'>";
		}
?>
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="images/<?=$data['p_picture'];?>" width="200" height="600">
      <div class="caption">
        <h4><?=$data['p_name'];?></h4>
        <h4><?=number_format($data['p_price'],0);?> บาท</h4>
        
      </div>
    </div>
  </div>
<?php 
		if ( ($i % 3 ) == 0){
			echo "</div>";	
		}
	} // end while

	mysqli_close($conn);
?>

</body>
</html>