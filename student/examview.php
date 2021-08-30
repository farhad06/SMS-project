<!DOCTYPE HTML>
<!--
	This Website Design & Maintained By BIJOY KUMAR DAS
-->
<?php 
	session_start();
	$cat=$_POST['test'];
	if(empty($_SESSION['student'])){
	
	header('location:login.php');	
}
	if(empty($_SESSION['exam'])){
	
	header('location:selectexam.php');	
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1">  					<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
						
<html>
	<head>
		<title>Online Exam Protal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload" onload="timeout()">

		<!-- Header -->
			<header id="header">
				<h3 style="color: white"> Don't Press <strong style="color: red"> Refresh</strong> Buttom</h3>
				<h3><strong style="color: white"> GIM SMS Online Exam System</strong></h3>
		        <h1 style="color: white"><div id="time" style="float:right" >timeout</div></h1>
				<h3 style="color: white" > Timer is runing</h3>
			 </header>


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<h3><strong> Student Name:<strong style="color: red"> <?php echo $_SESSION['student']['name']?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Student ID: <strong style="color: red"><?php echo $_SESSION['student']['studentid']?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Exam Name: <strong style="color: red"><?php echo $cat;?></strong> <br>Your Exam has<strong style="color: red"> Started!!</strong></strong></h3>


						<?php
						include("model/users.php");
						include ('model/helper.class.php');
						$qus=new  users;
						$cat=$_POST['test'];
						$qus->qus_show($cat);
						$_SESSION['cat']=$cat;
						$ins = new Examtime;
                        $tab = 'test';
                        $result = $ins->viewtab("$tab","$cat");
                        $row=$result->fetch_assoc();
                        $time=$row['time'];

						$i=1;
						$a=100;
						$b=200;
						$c=300;

			foreach($qus->qus as $qust) {?> 
			<form method="post" id="form1" action="answer.php">
		 	<table class="table table-bordered">
			<thead >
			 <tr >
			 <th><?php echo $i;?>&emsp;  <?php echo $qust['question']; ?>  </th>
			 </tr>
		    </thead>
			<tbody>
			<?php if(isset($qust['answer1'])){?>
			<tr><td><div class="col-4 col-12-small">&nbsp;1&emsp;
				<input type="radio" value="1" id="<?php echo($i);?>" name="<?php echo $qust['id']; ?>" />&nbsp;
				<label for="<?php echo($i) ;?>"><?php echo $qust['answer1'];?></label>
			</div></td></tr>
			<?php }?>
			<?php if(isset($qust['answer2'])){?>
			<tr><td><div class="col-4 col-12-small">&nbsp;2&emsp;
			   <input type="radio" value="2" id="<?php echo($a);?>"  name="<?php echo $qust['id']; ?>" />&nbsp;
				<label for="<?php echo($a);?>"><?php echo $qust['answer2'];?></label>
			</div></td></tr>
			<?php }?>
			<?php if(isset($qust['answer3'])){?>
			<tr><td><div class="col-4 col-12-small">&nbsp;3&emsp;
				<input type="radio" value="3" id="<?php echo($b);?>"  name="<?php echo $qust['id']; ?>" />&nbsp;
				<label for="<?php echo($b);?>"><?php echo $qust['answer3'];?></label>
			</div></td></tr>
			<?php }?>
			<?php if(isset($qust['answer4'])){?>
			<tr><td><div class="col-4 col-12-small">&nbsp;4&emsp;
			 <input type="radio" value="4" id="<?php echo($c);?>" name="<?php echo $qust['id']; ?>" />&nbsp;
				<label for="<?php echo($c);?>"><?php echo $qust['answer4'];?></label>
			</div></td></tr>
			<tr><td><input type="radio" checked="checked" style="display: none;" value="no_attempt" name="<?php echo $qust['id']; ?>"></td></tr>
			<?php }?>
			</div>
			</tbody>
			
		  </table>
		<?php $i++;$a++;$b++;$c++;}?>
	<center><input type="submit" value="Submit Exam" class="btn btn-success" />
   

	</center>
</form>
<div class="content">
 <div class="container">									
  <div class="col-sm-7">
		
		  								
		  </div></div></body>
           </div></div></section>



				
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
						<script type="text/javascript">
		 					 var timeLeft=1*<?php echo "$time"; ?>*60;
		 					</script>
                        <script type="text/javascript">
						function timeout()
						{
						var hours=Math.floor(timeLeft/3600);
						var minute=Math.floor((timeLeft-(hours*60*60))/60);
						var second=timeLeft%60;
						var hrs=checktime(hours);
						var mint=checktime(minute);
						var sec=checktime(second);
						if(timeLeft<=0)
							{
						clearTimeout(tm);
						window.alert("Time Out. Your Exam Submit Automatically.");
						document.getElementById("form1").submit();

						 }
						else
							{

						   document.getElementById("time").innerHTML=hrs+":"+mint+":"+sec;
							}
							timeLeft--;
							var tm= setTimeout(function(){timeout()},1000);
							}
							function checktime(msg)
							{
							if(msg<10)
							{
							msg="0"+msg;
							}
							return msg;
							}
							</script>

</html>