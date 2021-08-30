<!DOCTYPE HTML>
<html>
<head>
<title>GIM Student Management System
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css.css">
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
$classname =$_POST["classname"];


include ('model/helper.class.php');
    $ins = new attdence;
    $ru = $ins->viewstudent("$classname");
    if(!is_object($ru)){
    die("No users found");
    }
    
date_default_timezone_set('Asia/Kolkata');
  $date =date("Y-m-d");


?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Class Name : <?php echo "$classname"; ?> </h2>
<table width="100%" id="table">
<thead>
<tr>
         <th align="left">Student ID</th>
         <th align="left">Student Name</th>
         
         <th align="left">Published Date</th>
         <th align="left">Print</th>
          
</tr>
</thead>
<tbody>
  <form method="get" action="cdsaca.php">
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td ><?php echo $rows['studentid'];?></td>
    <td ><?php echo $rows['name'];?></td>
    <td>
      <label class="switch">
      <input type="checkbox" name="<?php echo $rows['name'];?>" value="checkbox" id="checkbox">
      <span class="slider round"></span>
     </label>
    </td> 

  </tr>
<?php }?>
<tr><td><input type="submit" name=""></td></tr>
</form>
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
<script>
$(document).ready(function(){
 
 $('#gender').bootstrapToggle({
  on: 'Male',
  off: 'Female',
  onstyle: 'success',
  offstyle: 'danger'
 });

 $('#gender').change(function(){
  if($(this).prop('checked'))
  {
   $('#hidden_gender').val('Male');
  }
  else
  {
   $('#hidden_gender').val('Female');
  }
 });

 $('#insert_data').on('submit', function(event){
  event.preventDefault();
  if($('#name').val() == '')
  {
   alert("Please Enter Name");
   return false;
  }
  else
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data){
     if(data == 'done')
     {
      $('#insert_data')[0].reset();
      $('#gender').bootstrapToggle('on');
      alert("Data Inserted");
     }
    }
   });
  }
 });

});
</script>