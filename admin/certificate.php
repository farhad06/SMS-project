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
if($_SESSION["userid"]==true)
{

include("header.php"); 
include("connect.php");
?>

  
<?php

include ('model/helper.class.php');
    $ins = new table;
    $tab = 'certificate';
    $ru = $ins->viewtab("$tab");
    


?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Certificate</h2>
<table width="100%" id="table">
<thead>
<tr>
         <th align="left">Student Name</th>
         <th align="left">Student ID</th>
         <th align="left">Class</th>
         <th align="left">Memo No</th>
         <th align="left">Certificate Type</th>
         <th align="left">Message</th>
         <th align="left">Apply Date</th>
         <th align="left">Approve Date</th>
         <th align="left">Action</th>         
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
    $sid=$rows['sid'];
    //var_dump($sid);
    $in = new table3;
    $tab1 = 'student';
    $result = $in->viewtab("$tab1","id","$sid");
    $row=$result->fetch_assoc();
    //var_dump($row);
    //exit();
?>

    <tr>
    <td ><?php echo $row['name'];?></td>
    <td ><?php echo $row['studentid'];?></td>
    <td ><?php echo $row['class'];?></td>
    <td ><?php echo $rows['memono'];?></td>
    <td ><?php echo $rows['type'];?></td>
    <td ><?php echo $rows['message'];?></td>
    <td ><?php echo $rows['applydate'];?></td>
    <td ><?php echo $rows['approvedate'];?></td>
    <td><?php if($rows['status']=='Not Approve'){ ?><button class="btn btn-default"><a href="?view&status=Approve&id=<?php echo $rows['id']?>">Approve</a></button><?php }
    else { ?><button class="btn "><a href="#">Print</a></button><?php } ?> </td>
    
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
  <?php }
else
  header('location:login.php');
?>
  </div>
</body>
<!--popup script start -->
  <!--popup script end -->

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      //$("#viewData").load("view.php");

      $("#submitbtn").click(function(){

        $("#regfrm").validate({

          submitHandler:function(){
            var formData = new FormData();
            
            
            var classname = $("#classname").val();
            var coursename = $("#coursename").val();
            
            formData.append('classname',classname);
            formData.append('coursename',coursename);
            formData.append('tab','class');
            
            $.ajax({
              url:"controller/add.php",
              type:"POST",
              processData: false,
                  contentType: false,
              data:formData,
              success:function(response){
                if(response==1){

                  $("#msg").fadeIn(1000);
                  $("#regfrm")[0].reset(); 
                  $("#msg").removeClass('alert alert-danger');
                  $("#msg").addClass('alert alert-success').html("Data Add Successful.");
                  setTimeout(function(){
                    $("#msg").fadeOut(1000);
                  },4000);
                } else {
                  $("#msg").fadeIn(1000);
                  //$("#regfrm")[0].reset(); 
                  $("#msg").removeClass('alert alert-success');
                  $("#msg").addClass('alert alert-danger').html(response);
                  setTimeout(function(){
                    $("#msg").fadeOut(1000);
                  },14000);
                }

              }
            })
          }
        });
      });
    });

</script>
<script type="text/javascript">
  function edit(Obj,column,id,tbl){
    var value = Obj.innerHTML;
    if(value=="") return;
    $.ajax({
      url:"controller/editable.php",
      data:{column:column,value:value,id:id,tbl:tbl},
      type:"POST",
      success:function(r){
        if(r==1) {
          $(Obj).css('background-color','green');
          setTimeout(function(){
            $(Obj).css('background-color','white');
          },2000);
        } else {
          console.log(r);
        }
      }
    })
  }
   $("#enableedit").click(function(){
    var val = $(this).html();
    if(val=="Edit"){
      $(".ce").prop('contenteditable',true);
      $(".ce").css('background-color','lightgreen');
      $(this).html('Finish?');
    } else {
      $(this).html('Edit');
      $(".ce").prop('contenteditable',false);
      $(".ce").css('background-color','white');

    }
  })

function delete1(id,tbl) {
              $.ajax({
              url:"controller/delete.php",
              type:"GET",
              data:{id:id,tbl:tbl},
              success:function(response){
                if(response==1){
                  $("#msg").fadeIn(2000); 
                  $("#msg").removeClass('alert alert-danger');
                  $("#msg").addClass('alert alert-success').html("Delete successfully");
                  setTimeout(function(){
                    $("#msg").fadeOut(1000);
                  },4000);
                  //document.location.reload(true);
                  window.location.href = 'class.php';
                } 
              }
            })
          }

</script>

</html>
      
      <?php
      if(isset($_GET['status'])){      
      $status = $_GET['status'];
      $id = $_GET['id'];
      date_default_timezone_set('Asia/Kolkata');
      $date =date("Y-m-d");
      $update = mysqli_query($con,"UPDATE certificate SET status = '$status' , approvedate = '$date' WHERE id = '$id'");
      
      if($update){
        ?><script>
        alert('Status has been changed successfully');
        window.location.href = 'certificate.php';
        
        </script><?php  
        
      }
    }

mysqli_close($con);
?>
