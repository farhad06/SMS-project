<?php
$tab = $_POST['tab'];
$ppass =md5($_POST['ppass']);
$cpass =md5($_POST['cpass']);
$id = $_POST['staffid'];

if ($ppass==$cpass) {
	//echo "MAtch";
	include('../model/add.class.php');
	$add = new Password;
    $exec = $add-> change("$tab","$id","password","$ppass");
    //var_dump($exec);
    if ($exec== 1) {
    	echo "Password change successfully";
    }

}
else{
	echo "Password & Confirm Password Mismatch!!!";
}

?>