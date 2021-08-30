  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		?><center><br><br><h1 style="color: green">Transaction status is success</h1><hr></center><?php
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		exit();
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		/*foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}*/

		$txnid =$_POST["ORDERID"];
		$amount =$_POST["TXNAMOUNT"];
		//var_dump($txnid);
		include ('../../staff/model/helper.class.php');
		$ins = new table3;
        $tab = 'demofees';
        $ru = $ins->viewtab("$tab","txnid","$txnid");
        $rows=$ru->fetch_assoc();
        
        $studentid=$rows['studentid'];
        $type=$rows['type'];
        $paymentmode=$rows['mode'];
        $date=$rows['date'];
        $id=$rows['id'];

		$feestab="INSERT INTO fees VALUES ('0','$studentid','$amount','$type','$paymentmode','$txnid','$date','1')";

		$delete = "DELETE FROM demofees WHERE id='$id'";
		/*$qry="INSERT INTO demofees VALUES ('0','$studentid','$TXN_AMOUNT','$type','$paymentmode','$ORDER_ID','$date','0')";*/

		$add = new fees;
        $exec = $add-> insert("$feestab");
        $exec = $add-> insert("$delete");

        $tab1 = "fees";
        $view = new table3;
        $ru = $view-> viewtab("$tab1","txnid","$txnid");
        $rows=$ru->fetch_assoc();
        $studentid=$rows["studentid"];

        $su = $view-> viewtab("student","studentid","$studentid");
        $st=$su->fetch_assoc();
        $newbal=($st["feesdue"] - $amount) ;
        $stutab="UPDATE `student` SET `feesdue`='$newbal' WHERE `studentid`='$studentid' ";
        $exec = $add-> insert("$stutab");
        //header('Location: ../../staff/txnhistory.php');
        ?><center><a href="/sms/PDF/feesreceipt.php?txnid=<?php echo"$txnid";?>"><button type="button" class="btn btn-primary">Download Receipt</button></a><br><br>
        	<br><a href="/sms/student/index.php"><button type="button" class="btn btn-success">Are You Student ?</button></a>
        <a href="/sms/staff/index.php">
          <button type="button" class="btn btn-success">Are You Staff ?</button></a></center>	
        <?php
	}

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>