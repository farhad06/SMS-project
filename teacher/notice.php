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
if($_SESSION["teacherid"]==true)
{

include("header.php"); ?>

  
<?php

include ('model/helper.class.php');
    $ins = new notice;
    //$tab = 'notice';
    $ru = $ins->viewtab("T");
    if(!is_object($ru)){
    die("No users found");
    }



?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Class</h2>
<table width="100%" id="table">
<thead>
<tr>
         <th align="left">Notice Title</th>
         <th align="left">Description</th>
         
         <th align="left">Published Date</th>
         <th align="left">Print</th>
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td class="ce" onBlur="edit(this,'title','<?php echo $rows['id']?>','notice')"><?php echo $rows['title'];?></td>
    <td class="ce" onBlur="edit(this,'description','<?php echo $rows['id']?>','notice')"><?php echo $rows['description'];?></td>
    <td><?php echo $rows['publishdate'];?></td>
    <td>
<button class="btn btn-dark text-white "><a href="/sms/PDF/noticeprint.php?id=<?php echo $rows['id'] ?>">PDF</a> </button>
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
}
else
  header('location:login.php');
?>
  </div>
</body>

</html>
<?php

mysqli_close($con);
?>
