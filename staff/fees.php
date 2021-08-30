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
  include ('model/helper.class.php');
	//View TableData
	$table = new TableViews;
    $result = $table->viewdata();
    if(!is_object($result)){
	die("No users found");
    }	
    $ins = new table;
    $tab = 'class';
    $result = $ins->viewtab("$tab");
    if(!is_object($result)){
    die("No users found");
    }
    //Teaching
    $ins = new table;
    $tab = 'course';
    $re = $ins->viewtab("$tab");
    if(!is_object($re)){
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

if($_SESSION["staffid"]==true)
{
include("connect.php");
include("header.php");
?>

	<ol class="breadcrumb">
	             <h2>Fees Collect</h2>
                
            </ol>

  	    
<?php

include("connect.php");

?>

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>List of Student</h2>
<h2 align="center">Student Search</h2><br />
   <center>
     <input type="text" name="search_text" id="search_text" required class="form-control" placeholder="Enter Student Details" />
    </center>
  <br>  

<div id="result"></div>


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
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"controller/feescollect.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

      </div>
    </div>
  </div>
  <script src="/js/jquery-1.10.2.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/dataTables/jquery.dataTables.js"></script>
    <script src="/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>