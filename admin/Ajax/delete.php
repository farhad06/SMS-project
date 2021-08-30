	<?php
    $con = mysqli_connect("localhost","root","","sms") or die(mysqli_error($con)); 
    $id = $_GET['id'];
    $qry = "DELETE FROM course WHERE courseid = '$id'";
	$exec = mysqli_query($con,$qry) or die(mysqli_error($con));
    echo "1";
	?>