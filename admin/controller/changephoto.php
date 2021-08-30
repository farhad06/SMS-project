<?php
$tab = $_POST['tab'];
$id = $_POST['staffid'];


		if(!empty($_FILES['image']['name'])){
	     $dir = 'images';	}
	
    //var_dump($dir);

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
    } 
    else {
	echo "file must be image file only (i.e jpg,png type )";
	exit; 
    } 

    
    include('../model/add.class.php');
	$add = new Password;
    $exec = $add-> change("$tab","$id","img","$file_destination_path");
    //var_dump($exec);
    if ($exec== 1) {
    	echo "Photo change successfully";
    }
    else{
	echo "Photo Not Change!!!";
   }



?>   