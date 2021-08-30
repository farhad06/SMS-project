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
                <h2>Exam History</h2>
            </ol>
  
<?php

include ('model/helper.class.php');
    $ins = new table3;
    $tab = 'exam';
    $class=$_SESSION['student']['id'];
    $ru = $ins->viewtab("$tab","sid","$class");
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
<tr>     <th align="left">Test Name</th>
         <th align="left">Exam Date</th> 
         <th align="left">Total Marks</th>
         <th align="left">Marks Obtain</th> 
         <th align="left">Mode</th>
         <th align="left">Result</th>        
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td ><?php echo $rows['examname'];?></td>
    <td ><?php echo $rows['examdate'];?></td>
    <td ><?php echo $rows['totalmarks'];?></td>
    <td ><?php echo $rows['marksobtain'];?></td>
    <td ><?php echo $rows['mode'];?></td>
    <td>
      <button class="btn btn-dark text-white "><a href="/sms/PDF/examresult.php?code=<?php echo $rows['examcode'] ?>">PDF</a> </button>
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
