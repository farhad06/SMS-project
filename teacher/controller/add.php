<?php
$string = '';
foreach ($_POST as $key => $value) {
	if($key=="tab" or $key=="okay"){
		continue;
	}
		    else {
		    	$string .= "'$value',";
		    }
		}
$tab = $_POST['tab']; 
   if(!empty($_FILES['file']['name'])){
	$dir = 'upload';
	if(!file_exists($dir)){
		mkdir($dir);
	}
	$filename = $_FILES['file']['name'];
	$filesize = $_FILES['file']['size'];
	$filetype = $_FILES['file']['type'];
	$file_tmp_copy = $_FILES['file']['tmp_name'];
	$file_error = $_FILES['file']['error'];
	$file_destination_path = $dir.'/'.rand(1111,9999).'_'.$filename;
	if($filesize > 11000000) {
		echo "File size exceeds 10 MB limit";
		exit;
	}
	move_uploaded_file($file_tmp_copy, $file_destination_path) or die($file_error);
    } 


$string = substr($string,0,-1);
if(!empty($file_destination_path)) {
	$string .= ",'$file_destination_path'";
    }  
include('../model/add.class.php');

    $add = new SaveData;
    $exec = $add-> register("$tab","$string");
    
    if ($exec== 1) {
    	echo "1";
    }
?>