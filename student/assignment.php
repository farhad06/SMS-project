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
{ $classname = $_SESSION['student']['class'];

include("header.php"); ?>

  <ol class="breadcrumb">
                <h2>Assignment List</h2>
            </ol>
  
<?php

include ('model/helper.class.php');
    $ins = new assignment;
    $tab = 'assignment';
    $ru = $ins->viewtab("$tab","$classname");
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
<h2>Assignment</h2>
<table width="100%" id="table">
<thead>
<tr>     <th align="left">Title</th>
         <th align="left">Description</th> 
         <th align="left">Class</th>
         <th align="left">Subject Name</th> 
         <th align="left">Teacher Name</th>
         <th align="left">Upload Date</th>        
         <th align="left">File</th>

          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td class="ce" onBlur="edit(this,'title','<?php echo $rows['id']?>','assignment')"><?php echo $rows['title'];?></td>
    <td class="ce" onBlur="edit(this,'description','<?php echo $rows['id']?>','assignment')"><?php echo $rows['description'];?></td>
    <td class="ce" onBlur="edit(this,'class','<?php echo $rows['id']?>','assignment')"><?php echo $rows['class'];?></td>
    <td class="ce" onBlur="edit(this,'subject','<?php echo $rows['id']?>','assignment')"><?php echo $rows['subject'];?></td>
    <td><?php echo $rows['teacher'];?></td>
    <td><?php echo $rows['uploaddate'];?></td> 
    <td><a href="/SMS/teacher/controller/<?php echo $rows['file']?>"><img src="../download.png" width="50" height="50"></a></td>       
  
  
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
  
  }
else
  header('location:login.php');
?>
  </div>
</body>
<!--popup script start -->

</html>
