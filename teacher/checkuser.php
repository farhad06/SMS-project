<?php
//session_start();// Starting Session
include("connect.php");
$user_check= $_SESSION["teacherid"];// Storing Session
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con,"select * from staff where empid = '$user_check'");
//echo $user_check;
$row = mysqli_fetch_assoc($ses_sql);
$my_id=$row['id'];
$my_name =$row['name'];
/*$my_lname =$row['lname'];
$my_gender =$row['gender'];
$my_blood =$row['blood'];
$my_mobile=$row['mobile'];
$my_email =$row['email'];
$my_address=$row['address'];
$my_department=$row['deptname'];
$my_birthdate=$row['dob'];
*/$my_file=$row['img'];
//$my_category=$row['catname'];
if(!isset($my_name)){
mysqli_close($con); // Closing Connection
//header('Location: usertbl.php'); // Redirecting To Home Page
}
?>
