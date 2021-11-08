<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
<title>สมัครสมาชิก</title>

    <style>
    	.well
      {
         padding: 35px;
         padding-left: 30px;
         box-shadow: 0 0 10px #666666;
         margin: 4% auto 0;
         width: 450px;
      }

     body {
  background: #F23DA6;
  /* fallback for old browsers */
  background: -webkit-linear-gradient(to top, #F23DA6, #343434);
  background: -moz-linear-gradient(to top, #F23DA6, #343434);
  background: -o-linear-gradient(to top, #F23DA6, #343434);
  background: linear-gradient(to top, #F23DA6, #343434);
  background-size: cover;
  background-attachment: fixed;
  font-family: 'Roboto', sans-serif;
}

      .input-group-addon
      {
      	background-color: #ffde6c;
      	color: #d17d00;
      }
        
        function validate()
		{
			if (document.myForm.txtfname.value == "") 
			{
				alert("Please Enter First Name");
				document.myForm.txtfname.focus();
				return false;
			}

			if (document.myForm.txtlname.value == "") 
			{
				alert("Please Enter Last Name");
				document.myForm.txtlname.focus();
				return false;
			}

			if (document.myForm.txtpass.value == "")
			{
				alert("Please Create your Password");
				document.myForm.txtpass.focus();
				return false;
			}

			if (document.myForm.txtmobile.value == "") 
			{
				alert("Please enter Mobile Number");
				document.myForm.txtmobile.focus();
				return false;
			}

			if (document.myForm.txtmail.value == "") 
			{
				alert("Please Enter E-Mail ID");
				document.myForm.txtmail.focus();
				return false;
			}

			if (document.myForm.txtadd.value == "") 
			{
				alert("Please Enter Address");
				document.myForm.txtadd.focus();
				return false;
			}

			if (document.myForm.dob.value == "")
			{
				alert("Please Enter Date of Birth");
				document.myForm.dob.focus();
				return false;
			}
		}
    </style>
</head>
<body>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form action="#" name="myForm" method="post" onsubmit="return(validate());">
	<div class="container-fluid">
		<div class="row">
			<div class="well center-block">
				<div class="well-header">
					<h3 class="text-center text-success"> สมัครสมาชิก </h3>
					<hr>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</div>
								<input type="text" placeholder="First Name" name="fname" class="form-control">
								
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</div>
								<input type="text" placeholder="Last Name" name="lname" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-lock"></i>
								</div>
								<input type="password" minlength="8" maxlength="20" placeholder="Password" name="pass" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-phone"></i>
								</div>
								<input type="number" minlength="10" maxlength="12" class="form-control" name="tel" placeholder="Mobile No.">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-envelope"></i>
								</div>
								<input type="email" class="form-control" name="mail" placeholder="E-Mail">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-list-alt"></i>
								</div>
								<textarea class="form-control" name="add" placeholder="Address"></textarea>
							</div>
						</div>
					</div>
				</div>

				
				<div class="row widget">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<button class="btn btn-warning btn-block" name="submit"> สมัคร </button><br>
					</div>
				</div>
                
                <center><p>Don't have an Account? <a href="login.php"> Login Now!</a></p></center>
                
			</div>
		</div>    
	</div>


</form>
    <?php
    
if(isset($_POST['submit'])){    
    include_once("connectdb.php");
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $address = $_POST['add'];
    
    
      
    $sql = "INSERT INTO `member` (`Id_m`, `fname`, `lname`, `pass`, `tel`, `address`, `email`) VALUES (NULL, '{$fname}', '{$lname}', '".md5($_POST['pass'])."', '{$tel}', '{$address}', '{$mail}');";
    //var_dump($sql); exit;
    mysqli_query($conn, $sql) or die ("สมัครสมาชิกไม่สำเร็จ");
    

        
    
    
    echo "<script>";
    echo "alert('สมัครสมาชิกสำเร็จ');";
    echo "window.location='login.php';";
    echo "</script>";
    
}    
    ?>
    
    
    
</body>
</html>