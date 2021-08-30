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
		
		$cid = "GIM/2019/".rand(1111,9999);
		$qry = "INSERT INTO $tab VALUES ('0','$cid',$string)";

		try{
		$exec = $this->conn->query($qry);
		if($exec){
			return $cid;
		}
		}catch(SQLException $ee) {
			return $ee->getMessage();
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
}

class TableViews extends Connect {
	function viewdata(){
		try{
		$re = $this->conn->query("SELECT * FROM staff");

		if($re->num_rows > 0) {
			return $re;
		}
	}catch(SQLException $e){
		return $e->getMessage();
	}


	}
}

class table extends Connect {
	function viewtab($tab){
		try{
		$re = $this->conn->query("SELECT * FROM $tab");

		if($re->num_rows > 0) {
			return $re;
		}
	}catch(SQLException $e){
		return $e->getMessage();
	}


	}
}
//teacher and staff
class table2 extends Connect {
	function viewtab($tab,$cat){
		try{
		$result = $this->conn->query("SELECT * FROM $tab WHERE staff_category='$cat'");
		//var_dump($result);
		if($result->num_rows > 0) {
			return $result;

		}
	}catch(SQLException $e){
		return $e->getMessage();
	}


	}
}
class table3 extends Connect {
	function viewtab($tab,$cat,$value){
		try{
		$result = $this->conn->query("SELECT * FROM $tab WHERE $cat='$value'");
		//var_dump($result);
		if($result->num_rows > 0) {
			return $result;

		}
	}catch(SQLException $e){
		return $e->getMessage();
	}


	}
}

class idfind extends Connect {
	function viewtab($tab,$id){
		try{
		$result = $this->conn->query("SELECT * FROM $tab WHERE id='$id'");
		//var_dump($result);
		if($result->num_rows > 0) {
			return $result;

		}
	}catch(SQLException $e){
		return $e->getMessage();
	}


	}
}
/**
 * 
 */
class emailcheck extends connect
{
	
	function check($tab,$email)
	{ try{
		$check = $this->conn->query("SELECT * from $tab where email='$email'");

		if($check->num_rows > 0) {
			return 1;
		}
	}catch(SQLException $e){
		return $e->getMessage();
	}
		
	}
}
?>