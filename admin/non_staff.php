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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		label.error{
			color:red;
			padding:5px;
			background-color: yellow;
			margin-left:10px;
		}
		#loader{
			display: none;
		}
	</style>
	<?php
include ('controller/helper.class.php');
$ins = new Views;
$ru = $ins->viewUsers();
if(!is_object($ru)){
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

if($_SESSION["userid"]==true)
{
include("connect.php");
include("header.php");
?>

	<ol class="breadcrumb">
	             <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>
                
            </ol>
  	    
<?php

include("connect.php");

?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>List of Teaching Staff</h2>
<table width="100%" id="table">
<thead>
<tr>
               <th align="left">Id</th>
			   <th align="left">First Name</th>
			   <th align="left">Last Name</th>
			   <th align="left">Mobile</th>
			   <th align="left">Department</th>
			   <th align="left">Category</th>
			   <th align="left">File</th>
			   <th align="left">Action</th>
			    
</tr>
</thead>
<tbody>
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

	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title">Non-Teaching Staff Registration Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          	<div class="container-fluid">
          		<span id="loader"><i class="fa fa-spinner fa-spin fa-3x"></i> Processing..please wait..</span>
<div class="col-md-6" id="msg"></div>
<form method="post" id="regfrm" enctype="multipart/form-data">
  <input type="hidden" name="tab" value="register">
  <table>
    <tr>
  		<td>Full Name</td>
        <td><input type="text" name="name" id="name" minlength="3" required placeholder="Full Name"></td>
    </tr>
    <tr>
        <td>Gender</td>
      <td><select name="gender" id="gender" required>
            	<option value="">Select</option>
            	<option value="Male">Male</option>
            	<option value="Female">Female</option>
            	<option value="Other">Other</option>            	
              </select>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email" id="email" required placeholder="nmae@example.com"></td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td><input type="text" name="phone" id="phone" required minlength="10" maxlength="10" placeholder="10 Digits"></td>
    </tr>
    <tr>
      <td>Date Of Birth</td>
      <td><input type="date" name="dob" id="dob" required></td>
    </tr>
      <tr>
      <td>Address</td>
      <td><input type="text" name="address" id="address" required minlength="4"></td>
    </tr>
    <tr>
      <td>Staff Category</td>
      <td><select name="category" id="category" required>
              <option value="">Select</option>
              <option value="Non_Teaching">Non Teaching</option>
              <option value="Other">Other</option>              
              </select>
      </td>
    </tr>
    <tr>
      <td>Staff Department</td>
      <td>
      	<select name="department" id="department">
      				<option value="">Select</option>	
					<?php while($row=$ru->fetch_assoc()){?>
					<option value="<?php echo $row['deptname']?>"><?php echo $row['deptname']?></option>

				<?php } ?>
				</select>
      </td>
    </tr>
    <tr>
      <td>Highest Qualification</td>
      <td>
        <select name="qualification" id="qualification" required>
              <option value="">Select</option>
              <option value="MP">MP</option>
              <option value="HS">HS</option>
              <option value="Other">Other</option>              
              </select>
      </td>
    </tr>
    <tr>
      <tr>
      <td>
        Salary
      </td>
      <td>
        <input type="text" name="salary" id="salary" required placeholder="00.00" maxlength="8" minlength="4">
      </td>
    </tr>
    <tr>
      <td>
        Profile Photo
      </td>
      <td>
        <input type="file" name="image" id='file' required>
      </td>
    </tr>
    
    
    <tr>
      <td>
        <input type="submit" name="okay" value="Register" id="submitbtn" class="btn btn-primary">
      </td>
      <td><input type="reset" name="" class="btn btn-primary"></td>
    </tr>
  </table>
</form>
</div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script type="text/javascript">
    $(document).ready(function(){

      //$("#viewData").load("view.php");

      $("#submitbtn").click(function(){

        $("#regfrm").validate({

          submitHandler:function(){
            var formData = new FormData();
            formData.append('image', $('#file')[0].files[0]);
            


            var name = $("#name").val();
            var gender = $("#gender").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var dob = $("#dob").val();
            var address = $("#address").val();
            var category = $("#category").val();
            var department = $("#department").val();
            var qualification = $("#qualification").val();
            var salary = $("#salary").val();

            formData.append('name',name);
            formData.append('gender',gender);
            formData.append('email',email);
            formData.append('phone',phone);
            formData.append('dob',dob);
            formData.append('address',address);
            formData.append('category',category);
            formData.append('department',department);
            formData.append('qualification',qualification);
            formData.append('salary',salary);
            formData.append('tab','staff');
            
            $.ajax({
              url:"controller/dataadd.php",
              type:"POST",
              processData: false,
                  contentType: false,
              data:formData,
              beforeSend:function(response){
                $("#loader").fadeIn(1000);
              },
              error:function(response){
                $("#loader").fadeOut(1000);
                console.log(response.status);

              },
              success:function(response){
                if(response==1){

                  $("#msg").fadeIn(1000);
                  $("#regfrm")[0].reset();
                  $("#loader").fadeOut(1000); 
                  $("#msg").removeClass('alert alert-danger');
                  $("#msg").addClass('alert alert-success').html("Data saved successfully");
                  setTimeout(function(){
                    $("#msg").fadeOut(1000);
                  },14000);
                  //$("#viewData").load("view.php");
                } else {
                  $("#msg").fadeIn(1000);
                  $("#loader").fadeOut(1000); 
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

      </div>
    </div>
  </div>
</body>
</html>