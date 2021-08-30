<?php
$string = '';
$phone = '';
foreach ($_POST as $key => $value) {
	if($key=="tab" or $key=="okay"){
		continue;
	}
		    else {
		if($key=="phone"){
		$phone = $value;
		}    	
		if($key=="email"){
		$email = $value;
		$tab = $_POST['tab'];
		$con=mysqli_connect("localhost","root","","sms") or die(mysqli_error($con));
		$count=0;
	    $res=mysqli_query($con,"select * from $tab where email='$email' OR phone='$phone'");
	    $count=mysqli_num_rows($res);
		if ($count>0) {
			echo "Email Id or Phone Number Already Exists.";
			exit();
		       }

		} 
			$string .= "'$value',";
	}
}
    if(!empty($_FILES['image']['name'])){
	$dir = 'images';
	if(!file_exists($dir)){
		mkdir($dir);
	}
	$filename = $_FILES['image']['name'];
	$filesize = $_FILES['image']['size'];
	$filetype = $_FILES['image']['type'];
	$file_tmp_copy = $_FILES['image']['tmp_name'];
	$file_error = $_FILES['image']['error'];
	$file_destination_path = $dir.'/'.rand(1111,9999).$filename;
	if($filesize > 11000000) {
		echo "File size exceeds 10 MB limit";
		exit;
	}
	if($filetype=="image/jpg" or $filetype == "image/jpeg" or $filetype == "image/png") {
	move_uploaded_file($file_tmp_copy, $file_destination_path) or die($file_error);
    } else {
	echo "file must be image file only (i.e jpg,png type )";
	exit; 
    }
    } else {
	$file_destination_path = '';
    }

	$string = substr($string,0,-1);
    if(!empty($file_destination_path)) {
	$string .= ",'$file_destination_path','100','0'";
    }

    $tab = $_POST['tab'];
    $email = $_POST['email'];

    include('../model/helper.class.php');

    $add = new SaveData;
    $exec = $add-> register("$tab","$string");
    
   	if(!$exec == 0) {
	header("location:mail/mail.php?sid=$exec");
    }

?>
