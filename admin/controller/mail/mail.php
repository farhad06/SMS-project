<?php
if(isset($_GET['cid'])){
	$cid = $_GET['cid'];
    $con=mysqli_connect("localhost","root","","sms") or die(mysqli_error($con));
    $check = "SELECT * FROM staff WHERE empid = '$cid'";
	$exec = mysqli_query($con,$check) or die(mysqli_error($con));
	$row = mysqli_fetch_array($exec);
	function randStrGen($len){
    $result = "";
    $chars = "AJGTDWQYRBI123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}
	
date_default_timezone_set('Asia/Kolkata');
$name = $row['name'];
$email = $row['email'];
$password = randStrGen(8);
$pass=md5($password);
$phone = $row['phone'];
$body = "<center>Hi <b>$name</b>, Your registration is complete & Your Employment ID is <b>$cid</b>.<br>
		<h2 style='color:blue'>Your User ID is :  <i>$cid</i><br>
		Your Password is :  <i>$password</i>
		</h2><br><br><hr><p>This is an auto generated email please do not reply.</p></center>"
		;
    $qry = "UPDATE staff SET password = '$pass' WHERE empid = '$cid'";
	# execute
	
	$exec = mysqli_query($con,$qry) or die(mysqli_error($con));		



require_once('phpmailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

// $body             = file_get_contents('contents.html');
// $body             = eregi_replace("[\]",'',$body);
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.gmail.com"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "dasbijoy04@gmail.com";  // GMAIL username
$mail->Password   = base64_decode("Qmlqb3lAMDEwNQ==");            // GMAIL password

$mail->SetFrom('dasbijoy04@gmail.com', 'GIMSMS');

$mail->AddReplyTo("me.bkdas@gmail.com","$name");

$mail->Subject    = "Your registration is complete";

/*$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
*/
$mail->MsgHTML($body);

$address = "$email";
$mail->AddAddress($address, "$name");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  

   $curl = curl_init();
	curl_setopt_array($curl, array(
   CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=GIMSMS&route=4&mobiles=$phone&authkey=264669A4cCOzwY5c739372&message=Hello! $name, Your registration is complete.UserID: $cid and Password: $password",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  echo "1";
}
}
}
?>