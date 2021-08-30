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
    
    $ins = new table;
    $tab = 'class';
    $result = $ins->viewtab("$tab");
    if(!is_object($result)){
    die("No users found");
    }
date_default_timezone_set('Asia/Kolkata');
  $date =date("Y-m-d");


?>
<div class="agile-grids">
<div class="agile-tables">
  <form class="col-md-12 form-group" method="POST" action="getattdence.php">
  <table>
    <tr>
      <td>Select Class</td>
      <td>
        <select name="classname" id="classname" required class="mdb-select md-form">
              <option value="" disabled selected>Select</option>  
          <?php while($row=$result->fetch_assoc()){?>
          <option value="<?php echo $row['classname']?>"><?php echo $row['classname']?></option> 
            <?php } ?>               
              </select>
      </td>
      <td><input type="submit" name="submit" id="submit" class="btn btn-success"></td>
    </tr>
  </table>
</form>
<div class="w3l-table-info">
<h2>Class</h2>

</div>
</div>
</div>

<?php include("footer.php"); ?>
</div>

</div>


  
  <?php include("sidebar.php"); ?>
  <?php 
}
else
  header('location:login.php');
?>
  </div>
</body>
<script type="text/javascript">
  $(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>
</html>
<?php

mysqli_close($con);
?>
