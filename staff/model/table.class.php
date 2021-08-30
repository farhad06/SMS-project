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

class TableViews extends Connect {
	function viewdata($tab,$id,$empid){
		try{
		$re = $this->conn->query("SELECT * FROM $tab WHERE $id='$empid'");
		/*var_dump($empid);
		exit();*/
		if($re->num_rows > 0) {
			return $re;
		}
	}catch(SQLException $e){
		return $e->getMessage();
	}


	}
}


?>