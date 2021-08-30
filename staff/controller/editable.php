<?php
$conn = mysqli_connect("localhost","root","","sms") or die(mysqli_error($conn)); 
	$column = $_POST['column'];
	$value = $_POST['value'];
	$id  = $_POST['id'];
	$tbl = $_POST['tbl'];
	$exec = mysqli_query($conn,"UPDATE `$tbl` SET `$column` = '$value' WHERE id = '$id'") or die(mysqli_error($conn));

	if($exec) {
		echo 1;
	}
?>