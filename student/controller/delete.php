<?php
$conn = mysqli_connect("localhost","root","","sms") or die(mysqli_error($conn)); 
$id = $_GET['id'];
$tbl = $_GET['tbl'];
$qry = "DELETE FROM `$tbl` WHERE id = '$id'";
$exec = mysqli_query($conn,$qry) or die(mysqli_error($conn));
echo "1";
?>
