<!DOCTYPE HTML>
<html>
<head>
<title>GIM Student Management
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GIM Student Management" />

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
session_start();
if($_SESSION["userid"]==true)
{

include("header.php"); ?>

	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h2><a href="">Add New Course</a></h2></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <table width="100%" id="#dataTables-example">
<thead>
<tr>
        <th align="left">Employee Id</th>
			   <th align="left">Name</th>
			   <th align="left">Gender</th>
			   <th align="left">Email</th>
			   <th align="left">Phone No</th>
			   <th align="left">DOB</th>
			   <th align="left">Address</th>
			   <th align="left">Staff Department</th>
			    
</tr>
</thead>
<tbody>
	<?php while($rows=$result->fetch_assoc()){?>
		<tr>
				<td><?php echo $rows['empid']?></td>
				<td><?php echo $rows['name']?></td>
        <td><?php echo $rows['gender']?></td>
				<td><?php echo $rows['email']?></td>
				<td><?php echo $rows['phone']?></td>
				<td><?php echo $rows['dob']?></td>
				<td><?php echo $rows['address']?></td>
				<td><?php echo $rows['staff_category']?></td>
			</tr>	

				<?php } ?>
</tbody>
</table>
    
 	<!---->
 </div>

</div>
 	<!--//grid-->
	<?php
	   include("connect.php");
	   if(isset($_POST['submit']))
       {		
         $name=$_POST['coursenm'];
	       $query = "INSERT INTO course VALUES ('0','$name')";
         $exec = mysqli_query($con,$query) or die ( mysqli_error($con) );
	 
	       if($exec)
		      echo "Record inserted successfully";
	       else
		     mysqli_error($con);
	       mysqli_close($con);
}

	
	?>
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