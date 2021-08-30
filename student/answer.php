<!DOCTYPE HTML>
<!--
	This Website Design & Maintained By BIJOY KUMAR DAS
-->

<?php
session_start();
if(empty($_SESSION['student'])){
	
	header('location:login.php');	
}
if(empty($_SESSION['exam'])){
	
	header('location:selectexam.php');	
}
?>

<html>
	<head>
		<title>Online Exam Protal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">

				<h3><strong style="color: white"> GitaRam Institute of Management.</strong></h3>
				
			 </header>

		<!-- Nav -->
			
		<!-- Heading -->
			<div id="heading" >
				<h1>Gim Sms Online Exam Protal</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<center>
					<h2><strong><?php echo $_SESSION['student']['name']?> <br>Your Exam is<strong style="color: red"> Over!!</strong></strong></h2></center>
					<div class="content">
						
						<?php
include("model/users.php");
$ans=new  users;
$answer=$ans->answer($_POST);
?>

	<center>
	<?php
	$total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
	$attempt_qus=$answer['right']+$answer['wrong'];
	$mark=($total_qus-($answer['wrong']+$answer['no_answer']));
	$mark=($mark*2);
	?>
	<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
  <h2>Your Exam results</h2>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Total number of Questions</th>
        <th><h2><?php
        	
         echo $total_qus; ?></h2></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attempted Qusetions</td>
        <td><h2><?php echo $attempt_qus;?><h2></td>
      </tr>
      <tr>
        <td>Right Answer </td>
        <td><h2><?php echo $answer['right'];?></h2></td>
      </tr>
      <tr>
        <td>Wrong Answer</td>
        <td><h2><?php echo $answer['wrong'];?></h2></td>
      </tr>
	  <tr>
        <td>No Attempt Questions</td>
        <td><h2><?php echo $answer['no_answer'];?></h2></td>
      </tr>
      <tr>
        <td><h2 style="color: red">Your Result</h2></td>
        <td><?php $mar=($answer['right']*2);
		?><h2 style="color: red">
		<?php echo  $mar ;?></h2></td>
      
      </tr>
	  <tr>
        <td><h3>Your Result in Percentage</h3></td>
        <td><?php 
		$per=($answer['right']*100)/($total_qus);
		?><h2 style="color: red">
		<?php echo $per."%" ;
		?></h2>
			<?php {				
								include ('connect.php');
								$studentid = $_SESSION['student']['id'];
								$examname = $answer['examname'];
								$examdate = date('d-m-Y');
								$totalmarks = $total_qus*2;
								$marksobtain = $mark;
								$examcode="GIM/EXAM/".rand(111,999);
								$right=$answer['right'];
								$wrong=$answer['wrong'];
								$no_answer=$answer['no_answer'];
								$qry = "INSERT INTO exam VALUES ('0','$examcode','$studentid','$examname','$examdate','$totalmarks','$marksobtain','Online','$total_qus','$attempt_qus','$right','$wrong','$no_answer','$per')";
				
				# execute the above query
				
				$exec = mysqli_query($con,$qry) or die ( mysqli_error($con) );
				
				?><script> 
					//window.alert("Thank You!!!!");
					//window.location.href = "login.php"; </script><?PHP
				}?>
		</td>
      </tr>
    </tbody>
  </table></div>
  <div class="col-sm-2"></div>
</div>							<ul class="actions">
										<li><a href="/SMS/PDF/examresult.php?code=<?php echo"$examcode" ?>" class="button primary">Print Result</a></li>
										<li><a href="index.php" class="button primary">Back to Dashboard</a></li>
										<li><a href="?logout" class="button primary">LogOut</a></li></ul>
	                           <?php if(isset($_GET['logout'])){
	# all running session will get destroyed
	session_destroy();
	
	# only single session
	unset($_SESSION['exam']);
	//header('location:login.php');
?><script> 
					window.alert("Thank You!!!!");
					window.location.href = "login.php"; </script><?PHP
				}?>
                         
	
	
	
	
	
	
	
	
	
	
	</h3></h3></td></tr></tbody></table></form>
	</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

					
					</div>
				</div>
			</section>
				
					<center>
					<div style="background: black">
						<h3 style="color: white"> &copy; GIM SMS. </h3>
					</div>
					</center>
		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>