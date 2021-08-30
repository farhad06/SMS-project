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
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Apply</button>
            </ol>
  
<?php

include ('model/helper.class.php');
    $ins = new table3;
    $tab = 'certificate';
    $sid = $_SESSION["student"]["id"];
    $ru = $ins->viewtab("$tab","sid","$sid");
    
    $ins = new table;
    $tab = 'class';
    $result = $ins->viewtab("$tab");
    
    //Teaching
    $ins = new table2;
    $tab = 'staff';
    $cat = 'Teaching';
    $re = $ins->viewtab("$tab","$cat");
    
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Assignment</h2>
<table width="100%" id="table">
<thead>
<tr>     <th align="left">Memo No</th>
         <th align="left">Certificate Type</th> 
         <th align="left">Message</th>
         <th align="left">Apply Date</th> 
         <th align="left">Approve Date</th>
         <th align="left">Status</th>        
         <th align="left">Action</th>
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>
    <tr>
    <td class="ce" onBlur="edit(this,'testname','<?php echo $rows['id']?>','test')"><?php echo $rows['memono'];?></td>
    <td class="ce" onBlur="edit(this,'description','<?php echo $rows['id']?>','test')"><?php echo $rows['type'];?></td>
    <td class="ce" onBlur="edit(this,'subject','<?php echo $rows['id']?>','test')"><?php echo $rows['message'];?></td>
    <td class="ce" onBlur="edit(this,'class','<?php echo $rows['id']?>','test')"><?php echo $rows['applydate'];?></td>
    <td class="ce" onBlur="edit(this,'time','<?php echo $rows['id']?>','test')"><?php echo $rows['approvedate'];?></td>
    <td class="ce" onBlur="edit(this,'mode','<?php echo $rows['id']?>','test')"><?php echo $rows['status'];?></td>       
    <td><?php if($rows['status']=='Not Approve'){ ?><button class="btn btn-default"><a href="?view&status=1&id=<?php echo $row['id']?>">Edit</a></button><?php }
    else { ?><button class="btn "><a href="/sms/PDF/certificate.php?id=<?php echo $rows['memono']?>">Print</a></button><?php } ?> </td>
  <!-- <td>
<button class="btn btn-dark text-white "><a href="#" onclick="delete1('<?php //echo $rows['id']?>','test'),confirm('Are you sure you wish to delete this Record?');">Delete </a> </button>
</td> -->
  </tr>
<?php }?>
<!-- <tr><td><button class="btn bg-alert dark text-white " id="enableedit"><a href="#"> Edit </a></button></td></tr> -->
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
  $memono ="GIM/CER/".rand(111,999);
  echo "$memono";
  }
else
  header('location:login.php');
?>
  </div>
</body>
<!--popup script start -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Apply For Certificate</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="container-fluid">     

<form method="post" id="regfrm" enctype="multipart/form-data">
<input type="hidden" name="sid" id="sid" value="<?php echo $_SESSION['student']['id']?>">
<input type="hidden" name="date" id="date" value="<?php echo"$date" ;?>">
<input type="hidden" name="memono" id="memono" value="<?php echo"$memono" ;?>"> 
  <table>
    <tr>
      <td>Certificate Type</td>
        <td><select name="type" id="type" required>
              <option value="">Select</option>  
              <option value="Character Certificate">Character Certificate</option>
              <option value="Other Certificate">Other Certificate</option>
              </select></td>
    </tr>
    <tr>
      <tr><td>Message</td>
      <td><textarea cols="27" required name="message" id="message"></textarea></td>
    </tr>
           
    <tr>
      <td>
        <input type="submit" name="okay" value="ADD" id="submitbtn" class="btn btn-primary">
      <input type="reset" name="" class="btn btn-dark"></td>
    </tr>
  </table>
</form>
<div class="col-md-6" id="msg"></div>
</div>
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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
            var sid = $("#sid").val();
            var type = $("#type").val();
            var memono = $("#memono").val();
            var message = $("#message").val(); 
            var date = $("#date").val();
            //console.log(memono);
            formData.append('sid',sid);
            formData.append('type',type);
            formData.append('memono',memono);
            formData.append('message',message);
            formData.append('date',date);
            formData.append('approvedate','Not Approve');
            formData.append('status','Not Approve');
            formData.append('tab','certificate');
            
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
                  window.location.href = 'exam.php';
                } 
              }
            })
          }

$(document).ready(function(){
 $('#classname').change(function(){
  
   var classname = $(this).val();
   $.ajax({
    url:"controller/fetchselect.php",
    method:"POST",
    data:{classname:classname},
    dataType:"text",
    success:function(data)
    {
     $('#subject').html(data);
    }
   });
  });
 });
</script>

</html>
