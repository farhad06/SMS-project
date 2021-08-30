<?php

class Connect{

		protected $conn;
	    function __construct() {
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'sms';

		try{
		$this->conn = new mysqli($host,$username,$password,$dbname);
		return $this->conn;
	}catch(SQLException $exp){
		return $exp->getMessage();
	}
	}
}

class SaveData extends Connect{


	function register($name,$email,$password,$url){
		//$connect = new Connect;
		//var_dump($connect);
		//exit;
		$qry = "INSERT INTO register VALUES ('0','$name','$email','$password','$url')";

		try{
		$exec = $this->conn->query($qry);
		if($exec){
			return true;
		}
		}catch(SQLException $ee) {
			return $ee->getMessage();
		}

	}

	function feedback($cid,$sub,$ratings){
		//$connect = new Connect;
		//var_dump($connect);
		//exit;
		$qry = "INSERT INTO feedback VALUES ('0','$cid','$sub','$ratings')";

		try{
		$exec = $this->conn->query($qry);
		if($exec){
			return true;
		}
		}catch(SQLException $ee) {
			return $ee->getMessage();
		}

	}

	function fileUpload($tmp,$destination){
	try{
		$ups = move_uploaded_file($tmp,'../'. $destination);
		if($ups){
		return true;
	}
	}catch(Exception $e){
		return $_FILES['file']['error'];
	}

	}
}
class Views extends Connect {
	function viewUsers(){
		try{
		$res = $this->conn->query("SELECT * FROM department");

		if($res->num_rows > 0) {
			return $res;
		}
	}catch(SQLException $e){
		return $e->getMessage();
	}


	}

	function viewFeedbacks(){
		$res = 	$this->conn->query("SELECT f.*,r.* FROM feedback f JOIN register r WHERE r.id = f.cid");
		if($res->num_rows > 0 ) {
			return $res;
		} else {
			return 0;
		}
	}
}

?>