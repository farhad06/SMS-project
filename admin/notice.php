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
    $tab = 'notice';
    $ru = $ins->viewtab("$tab");
    /*if(!is_object($ru)){
    die("No users found");
    }*/



?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Notice</h2>
<table width="100%" id="table">
<thead>
<tr>
         <th align="left">Notice Title</th>
         <th align="left">Description</th>
         <th align="left">For</th>
         <th align="left">Published Date</th>
         <th align="left">Print</th>
         <th align="left">Action</th>
          
</tr>
</thead>
<tbody>
<?php while($rows=$ru->fetch_assoc())
{
  ?>

    <tr>
    <td class="ce" onBlur="edit(this,'title','<?php echo $rows['id']?>','notice')"><?php echo $rows['title'];?></td>
    <td class="ce" onBlur="edit(this,'description','<?php echo $rows['id']?>','notice')"><?php echo $rows['description'];?></td>
    <td class="ce" onBlur="edit(this,'noticefor','<?php echo $rows['id']?>','notice')"><?php echo $rows['noticefor'];?></td>
    <td><?php echo $rows['publishdate'];?></td>
    <td>
<button class="btn btn-dark text-white "><a href="controller/PDF/noticeprint.php?id=<?php echo $rows['id'] ?>">PDF</a> </button>
</td> 
  <td>
<button class="btn btn-dark text-white "><a href="#" onclick="delete1('<?php echo $rows['id']?>','notice'),confirm('Are you sure you wish to delete this Record?');">Delete </a> </button>
</td>

  </tr>
<?php }?>
<tr><td><button class="btn bg-alert dark text-white " id="enableedit"><a href="#"> Edit </a></button></td>
<td>
  <p style="color: red"> S=STUDENT, T=STAFF, B=BOTH</p>
</td>
</tr>
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
    $date =date("Y-m-d h:i:sa");
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
          <h4 class="modal-title">Add Notice</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="container-fluid">             
<form method="post" id="regfrm" enctype="multipart/form-data">
  <input type="hidden" name="tab" value="register">
  <input type="hidden" name="date" id="date" value="<?php echo"$date"; ?>">
  <table>
    <tr>
      <td>Notice Title</td>
        <td><input type="text" name="title" id="title" minlength="2" required placeholder="Notice Title"></td>
    </tr>
    <tr>
      <td>
        Notice Description
      </td>
      <td>
        <textarea name="description" id="description" required="" placeholder="Notice Description" cols="30"></textarea>
      </td>
    </tr>
    <tr>
        <td>Notice For</td>
      <td><select name="noticefor" id="noticefor" required>
              <option value="">Select</option>  
              <option value="S">Student</option>
              <option value="T">Staff</option>
              <option value="B">Both</option> 
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
            
            
            var title = $("#title").val();
            var description = $("#description").val();
            var noticefor = $("#noticefor").val();
            var publishdate = $("#date").val();
            var lastupdate = $("#lastupdate").val();
            
            formData.append('title',title);
            formData.append('description',description);
            formData.append('noticefor',noticefor);
            formData.append('publishdate',publishdate);
            formData.append('lastupdate',lastupdate);
            formData.append('tab','notice');
            
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
                  window.location.href = 'notice.php';
                } 
              }
            })
          }

</script>

</html>
<?php

mysqli_close($con);
?>
