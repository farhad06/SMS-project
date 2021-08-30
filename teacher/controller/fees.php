<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<body>
<?php
date_default_timezone_set('Asia/Kolkata'); 
$paymentmode = $_POST["paymentmode"];
$studentid = $_POST["studentid"];
$amount = $_POST["amount"];
$type = $_POST["paymenttype"];
$name = $_POST["name"]; 
$email = $_POST["email"];
$mobile =$_POST["phone"];
$date =date("Y-m-d h:i:sa");
$Online ="Online";

//
$paymentdue = $_POST["paymentdue"];
$newbal = ($paymentdue-$amount);

if ($paymentmode == $Online ) {
//////////////////////////
?><center>
<h1 style="color: red">GIMSMS Online Payment System</h1><br><hr>
<form method="post" action="/sms/Paytm/PaytmKit/pgRedirect.php">
          <div class="container">
          <table class="table table-hover">
            <thead>
              <tr> 
                <th>Transaction Details</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>
                <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"name="ORDER_ID" autocomplete="off"value="<?php echo  "GIM" . rand(10000,99999999)?>">
                <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
                        size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">        
                <tr>
                    <td><label>STUDENT NAME</label></td>
                    <td>
                        <input type="text" readonly name="name" id="name" value="<?php echo"$name"; ?>" >
                    </td>
                </tr>
                <tr>
                    
                    <td><label>STUDENT ID</label></td>
                    <td><input id="CUST_ID"  maxlength="30" size="30" name="CUST_ID" value="<?php echo"$studentid"; ?>"></td>
                </tr>
                <tr>
                    <td><label>PAYMENT TYPE</label></td>
                    <td>
                        <input type="text" name="paymenttype" id="paymenttype" readonly="" value="<?php echo"$type"; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label>PAYMENY MODE</label></td>
                    <td>
                        <input type="text" name="paymentmode" id="paymentmode" value="<?php echo"$paymentmode"; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label>Txn Amount</label></td>
                    <td><input title="TXN_AMOUNT" readonly tabindex="10"
                        type="text" name="TXN_AMOUNT"
                        value="<?php echo"$amount"; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="" value="aaa">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input value="PAYMENT" type="submit"   onclick="" class="btn btn-success"></td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
</center>
<?php
//////////////////////////////
}
else{
    $txnid="CASH/".date("Y-m-d")."/".rand(111,999);
    $qry="INSERT INTO fees VALUES ('0','$studentid','$amount','$type','$paymentmode','$txnid','$date','1')";
    include ('../model/helper.class.php');
    $add = new fees;
    $exec = $add-> insert("$qry");

    //var_dump($exec);
    if ($exec== true) {
        
        $update="UPDATE `student` SET `feesdue`='$newbal' WHERE `studentid`='$studentid' ";
        $add = new fees;
        $exec = $add-> insert("$update");
        //var_dump($exec);
        ?>
        <script type="text/javascript">
            alert("Payment Success!!!");
            window.location.href = '../fees.php';
        </script>
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Something Went Wrong!!!");
            window.location.href = '../fees.php';
        </script>

        <?php
    }
}



?>
</body>
</html>
