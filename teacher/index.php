<!DOCTYPE HTML>
<html>
<head>
<title>GIM Student Management Stytem</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GIM Student Management Stytem" />

</head> 


<body>

<div class="page-container">
<div class="left-content">
	<h1>GIM Student Management Stytem</h1>
<div class="mother-grid-inner">

<?php 
session_start();
if($_SESSION["teacherid"]==true)

{
include("connect.php");
include("fetch_records.php")
?>
<?php include("header.php"); ?>


	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">TEACHER Dashboard</a></h4></li></center>
            </ol>

			
			<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>DEPARTMENTS</h3>
								<h4> <?php echo number_format($department); ?>  </h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>STUDENTS</h3>
								<h4><?php echo number_format($students); ?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>EXAMINATIONS</h3>
								<h4><?php echo number_format($examination); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-file" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>SUBJECTS</h3>
								<h4><?php echo number_format($subjects); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->
	
	<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-file" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>ASSIGNMENT</h3>
								<h4><?php echo number_format($categories); ?>  </h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-credit-card" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>NOTICE</h3>
								<h4><?php echo number_format($notice); ?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>FEES</h3>
								<h4><?php echo number_format($questions); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-lock" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>BANNED STUDENTS</h3>
								<h4><?php echo number_format($banned_students); ?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->

	
	
<?php include("footer.php"); ?>
</div></div>
        
	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	</div>
</body>
</html>