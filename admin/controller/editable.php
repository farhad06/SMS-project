<?php
$conn = mysqli_connect("localhost","root","","sms") or die(mysqli_error($conn)); 
	$column = $_POST['column'];
	$value = $_POST['value'];
	$id  = $_POST['id'];
	$tbl = $_POST['tbl'];
	var_dump($id);
	exit();
	$exec = mysqli_query($conn,"UPDATE `$tbl` SET `$column` = '$value' WHERE id = '$id'") or die(mysqli_error($conn));

	if($exec) {
		echo 1;
	}
?>