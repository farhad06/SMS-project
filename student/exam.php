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
                <h2>Test List</h2>
            </ol>
  
<?php

include ('model/helper.class.php');
    $ins = new table3;
    $tab = 'test';
    $class=$_SESSION['student']['class'];
    $ru = $ins->viewtab("$tab","class","$class");
    if(!is_object($ru)){
    ?>
        <script type="text/javascript">
            alert("No Data Found!!!");
            window.location.href = 'index.php';
        </script>

        <?php
    }
    
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Test List</h2>
<table width="100%" id="table">
<thead>
<tr>     <th align="left">Test Name</th>
         <th align="left">Description</th> 
         <th align="left">Subject Name</th>
         <th align="left">Class</th> 
         <th align="left">Time</th>
         <th align="left">Mode</th>        
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td class="ce" onBlur="edit(this,'testname','<?php echo $rows['id']?>','test')"><?php echo $rows['testname'];?></td>
    <td class="ce" onBlur="edit(this,'description','<?php echo $rows['id']?>','test')"><?php echo $rows['description'];?></td>
    <td class="ce" onBlur="edit(this,'subject','<?php echo $rows['id']?>','test')"><?php echo $rows['subject'];?></td>
    <td class="ce" onBlur="edit(this,'class','<?php echo $rows['id']?>','test')"><?php echo $rows['class'];?></td>
    <td class="ce" onBlur="edit(this,'time','<?php echo $rows['id']?>','test')"><?php echo $rows['time'];?></td>
    <td class="ce" onBlur="edit(this,'mode','<?php echo $rows['id']?>','test')"><?php echo $rows['mode'];?></td>       
  
 
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
