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
	function register($tab,$string){
		
		$qry = "INSERT INTO $tab VALUES ('0',$string)";
		try{
		$exec = $this->conn->query($qry);
		if($exec){
			return 1;
		}
		}catch(SQLException $ee) {
			return $ee->getMessage();
		}

	}
}
?>