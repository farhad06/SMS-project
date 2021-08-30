<!DOCTYPE HTML>
<html>
<head>
<title>GIM Student Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GIM Student Management" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	</style>
	<?php	
    $empid= "";
  if(isset($_GET['empid'])){
    $empid = $_GET['empid'];
    //var_dump($empid);
  }
    include ('model/table.class.php');
  $table = new TableViews;
  $tab = "student";
    $result = $table->viewdata("$tab","studentid","$empid");
    if(!is_object($result)){
  die("No users found");
    }

?>

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
session_start();
$rows=$result->fetch_assoc();
if($_SESSION["staffid"]==true)
{
include("connect.php");
include("header.php");
?>

	<ol class="breadcrumb">
	             <h2>Fees Collect</h2>
               <center><li class="breadcrumb-item"><h2 style="color: red"><?php echo $rows['name']?></h2></li></center>
          </ol>


<div class="validation-system">
    
    <div class="validation-form">
  <!---->
        
        <form method="post" id="regfrm" action="controller/fees.php">
        <div class="col-md-6 form-group1">
              <input type="hidden" name="tab" value="fees">
              <label class="control-label">Student ID</label>
              <input type="text" readonly name="studentid" id="studentid" value="<?php echo $rows['studentid']?>">
              </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Student Name</label>
              <input type="text" readonly name="name" id="name" value="<?php echo $rows['name']?>">
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Course</label>
              <input type="text" readonly name="course" id="course" value="<?php echo $rows['course']?>">
              </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Class</label>
              <input type="text" readonly name="classname" id="classname" value="<?php echo $rows['class']?>">
              </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Email</label>
              <input type="text" readonly name="email" id="email" value="<?php echo $rows['email']?>">
              </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Mobile No</label>
              <input type="text" readonly name="phone" id="phone" value="<?php echo $rows['phone']?>">
              </div>
              <div class="clearfix"> </div>
              <div class="clearfix"> </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Total Fees</label>
              <input type="text" readonly name="totalfees" id="totalfees" value="<?php echo $rows['totalfees']?>">
              </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Payment Due</label>
              <input type="text" readonly name="paymentdue" id="paymentdue" value="<?php echo $rows['feesdue']?>">
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-6 form-group1">
              <label class="control-label">Payment Received Amount</label>
              <input type="text" name="amount" id="amount" value="<?php echo $rows['feesdue']?>">
              </div>
              <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Payment Type</label>
              <select name="paymenttype" required="" id="paymenttype">
              <option value="">Select</option>
              <option value="Semester Fee">Semester Fee</option>
              <option value="Exam Fee">Exam Fee</option>
              <option value="Admission Fee">Admission Fee</option>
              <option value="Other">Reverse Payment</option> 
              <option value="Other">Other Fee</option>              
              </select>
            </div>
             <div class="clearfix"> </div>
              <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Payment Mode</label>
              <select name="paymentmode" required="" id="paymentmode">
              <option value="">Select</option>
              <option value="Cash">Cash Payment</option>
              <option value="Online">Online Payment</option>
              <option value="Other">Other Mode</option>              
              </select>
            </div>
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary" id="submitbtn" name="submit">Fees Collect</button>
              <button type="reset" class="btn btn-default" value="reset">Reset</button>
            </div>
    
          <div class="clearfix"> </div>
      
      
        </form>
    
  <!---->
 </div>

</div>

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">

   



</div>
</div>
</div>

	
<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); ?>
	
	<?php }
else
	header('location:login.php');
?>
	</div>

	
<!-- table Show  -->


      </div>
    </div>
  </div>
  <script src="/js/jquery-1.10.2.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/dataTables/jquery.dataTables.js"></script>
  <script src="/js/dataTables/dataTables.bootstrap.js"></script>


</body>
</html>