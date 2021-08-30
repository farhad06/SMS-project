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
$string = substr($string,0,-1);

include('../model/add.class.php');

    $add = new SaveData;
    $exec = $add-> register("$tab","$string");
    //var_dump($exec);
    if ($exec== 1) {
    	echo "1";
    }
?>