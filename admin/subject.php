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

include("header.php"); ?>

  <ol class="breadcrumb">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>
            </ol>
  
<?php

include ('model/helper.class.php');
    $ins = new table;
    $tab = 'subject';
    $ru = $ins->viewtab("$tab");
    /*if(!is_object($ru)){
    die("No users found");
    }*/
    $ins = new table;
    $tab = 'class';
    $result = $ins->viewtab("$tab");
    /*if(!is_object($ru)){
    die("No users found");
    }*/
    //Teaching
    $ins = new table2;
    $tab = 'staff';
    $cat = 'Teaching';
    $re = $ins->viewtab("$tab","$cat");
    /*if(!is_object($ru)){
    die("No users found");
    }*/
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Subject</h2>
<table width="100%" id="table">
<thead>
<tr>
         <th align="left">Subject Name</th>
         <th align="left">Class</th>
         <th align="left">Teacher</th>
         <th align="left">Action</th>
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td class="ce" onBlur="edit(this,'subjectname','<?php echo $rows['id']?>','subject')"><?php echo $rows['subjectname'];?></td>
    <td class="ce" onBlur="edit(this,'class','<?php echo $rows['id']?>','subject')"><?php echo $rows['class'];?></td>
    <td class="ce" onBlur="edit(this,'teacher','<?php echo $rows['id']?>','subject')"><?php echo $rows['teacher'];?></td>
  
  <td>
<button class="btn btn-dark text-white "><a href="#" onclick="delete1('<?php echo $rows['id']?>','class'),confirm('Are you sure you wish to delete this Record?');">Delete </a> </button>
</td>
  </tr>
<?php }?>
<tr><td><button class="btn bg-alert dark text-white " id="enableedit"><a href="#"> Edit </a></button></td></tr>
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Subject</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="container-fluid">             
<form method="post" id="regfrm" enctype="multipart/form-data">
  <input type="hidden" name="tab" value="register">
  <table>
    <tr>
      <td>Subject Name</td>
        <td><input type="text" name="subjectname" id="subjectname" minlength="2" required placeholder="Subject Name"></td>
    </tr>
    <tr>
        <td>Select Class</td>
      <td><select name="classname" id="classname" required>
              <option value="">Select</option>  
          <?php while($row=$result->fetch_assoc()){?>
          <option value="<?php echo $row['classname']?>"><?php echo $row['classname']?></option> 
            <?php } ?>               
              </select>
      </td>
    </tr>
    <tr>
        <td>Select Teacher</td>
      <td><select name="teacher" id="teacher" required>
              <option value="">Select</option>  
          <?php while($rows=$re->fetch_assoc()){?>
          <option value="<?php echo $rows['name']?>"><?php echo $rows['name']?></option> 
            <?php } ?>               
              </select>
      </td>
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
            
            
            var subjectname = $("#subjectname").val();
            var classname = $("#classname").val();
            var teacher = $("#teacher").val();
            
            formData.append('subjectname',subjectname);
            formData.append('classname',classname);
            formData.append('teacher',teacher);
            formData.append('tab','subject');
            
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
                  window.location.href = 'subject.php';
                } 
              }
            })
          }

</script>

</html>
<?php

mysqli_close($con);
?>
