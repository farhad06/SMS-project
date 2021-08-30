<?php
if($_SERVER['REQUEST_METHOD']==="POST") {
	include ('helper.class.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$url = "images/".rand(0000,9999).'_'.$_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];
	//$err = $_FILES['file']['error'];
	$instance1 = new SaveData;
	//var_dump($instance1);
	//exit;
	$ret = $instance1->fileupload($tmp,$url);
	if($ret) {
		$ret = $instance1->register($name,$email,$pass,$url);
		if($ret) {
			?><script type="text/javascript">
				alert('Done');
				window.location.href = '../feedback.php';
			</script><?php
		}  else {
			var_dump($ret);
		}
	} else {
		echo "File not uploaded";
	}





}
?>