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
 $classname=$_SESSION["student"]["class"];
 $_SESSION['exam']="EXAM";
include("header.php"); ?>

  
<?php

include ('model/helper.class.php');
    
    $ins = new Examselect;
    $tab = 'test';
    $result = $ins->viewtab("$tab","Online","$classname");
    if(!is_object($result)){
    ?><script type="text/javascript">
            alert("No Data Found!!!");
            window.location.href = 'index.php';
        </script><?php
    }
date_default_timezone_set('Asia/Kolkata');
  $date =date("Y-m-d");


?>
<div class="agile-grids">
<div class="agile-tables">
  <form class="col-md-12 form-group" method="POST" action="examview.php">
  <table>
    <tr>
      <td><b>Student Instructions</b><br><br>
          1. The Question Paper consists of multiple choice type question with 4 options out of which only 1 is correct.<br><br>
          2. There is a <b>TIMER</b>(Clock) available on the TOP RIGHT HAND CORNER of the Screen, you are requested to keep an eye on itfor knowing the time remaining for the completion of the exam.<br><br>
          3. Each Question is <b>2</b> marks.<br><br>
          4. Exam will be automatically submit, when time is over!!
      </td>
    </tr>
    <tr><td>
      <input type="checkbox" name="" required=""> I have read the instructions.
    </td></tr>
    <tr>
      <td>Select Class</td>
      <td>
        <select name="test" id="test" required class="mdb-select md-form">
              <option value="" disabled selected>Select</option>  
          <?php while($row=$result->fetch_assoc()){?>
          <option value="<?php echo $row['testname']?>"><?php echo $row['testname']?></option> 
            <?php } ?>               
              </select>
      </td>
      <td><input type="submit" name="submit" id="submit" value="Start Exam" class="btn btn-success"></td>
    </tr>
  </table>
</form>
<div class="w3l-table-info">
<h2>Read Instructions & Select Exam.</h2>

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
