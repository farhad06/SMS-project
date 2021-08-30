<!DOCTYPE HTML>
<html>
<head>
<title>GIM Student Management Stytem</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GIM Student Management Stytem" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link rel="stylesheet" href="css/table-style.css" type='text/css' />
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<center><img src="../logo.png"></center>
		<h2>Admin Sign In</h2>
		<form action="#" method="post" id="loginfrm">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			
			<div class="login-w3">
					<input type="submit" class="login" value="Sign In" name="login" id="login">
			</div>
			<div class="clearfix"></div>
		</form>
		        
				
				
	            
			   
					
			    <div class="footer">
					 <p>GIM Student Management Stytem</p>

				</div>
	</div>
	</div>
	</div>
</body>
</html>

<?php
session_start();
include("connect.php");

if(!empty($_POST["login"])) {


	$result = mysqli_query($con,"SELECT * FROM usertbl WHERE email='" . $_POST["email"] . "' and password = '".($_POST["password"])."'");

	if(mysqli_num_rows($result)==1){
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["userid"] = $row['uid'];
	$_SESSION["email"] = $row['email'];
	$_SESSION["fname"] = $row['fname'];
	$_SESSION["lname"] = $row['lname'];
	$_SESSION["file"] = $row['file'];
	$_SESSION["admin"] = $row;
	 header("Location:index.php");
	}
	}
  else{
  	?>
        <script type="text/javascript">
            alert("Invalid UserId or Password!!!");
        </script>

        <?php
  }
    
}
?>


