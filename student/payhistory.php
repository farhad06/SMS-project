<!DOCTYPE HTML>
<html>
<head>
<title>GIM Student Management System
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
session_start();
if($_SESSION["studentid"]==true)
{

include("header.php"); ?>

  <ol class="breadcrumb">
                <h2>Payment History</h2>
            </ol>
  
<?php

include ('model/helper.class.php');
    $ins = new table3;
    $tab = 'fees';
    $class=$_SESSION['student']['studentid'];
    $ru = $ins->viewtab("$tab","studentid","$class");
    if(!is_object($ru)){
    ?><script type="text/javascript">
            alert("No Data Found!!!");
            window.location.href = 'index.php';
        </script><?php
    }
    
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Exam List</h2>
<table width="100%" id="table">
<thead>
<tr>     <th align="left">Txn ID</th>
         <th align="left">Txn Date</th> 
         <th align="left">Payment Type</th>
         <th align="left">Payment Amount</th> 
         <th align="left">Mode</th>
         <th align="left">Receipt</th>        
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td ><?php echo $rows['txnid'];?></td>
    <td ><?php echo $rows['date'];?></td>
    <td ><?php echo $rows['type'];?></td>
    <td ><?php echo $rows['amount'];?></td>
    <td ><?php echo $rows['mode'];?></td>
    <td>
      <button class="btn btn-dark text-white "><a href="/sms/PDF/feesreceipt.php?txnid=<?php echo $rows['txnid'];?>">PDF</a> </button>
    </td>       
  
 
  </tr>
<?php }?>

</tbody>
</table>
</div>
</div>
</div>

<?php include("footer.php"); ?>
</div></div>


  
  <?php include("sidebar.php"); ?>
  <?php 
  date_default_timezone_set('Asia/Kolkata');
  $date =date("Y-m-d");

  }
else
  header('location:login.php');
?>
  </div>
</body>
<!--popup script start -->
  <!--popup script end -->

  
</html>
