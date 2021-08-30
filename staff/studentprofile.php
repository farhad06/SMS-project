<!DOCTYPE HTML>
<html>
<head>

<title>GIM Student Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GIM Student Management System" />

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
    //Staff Profile
	$empid= "";
	if(isset($_GET['empid'])){
		$empid = $_GET['empid'];
		//var_dump($empid);
	}
    include ('model/table.class.php');
    $tab = "student";
	$table = new TableViews;
    $result = $table->viewdata("$tab","id","$empid");
    if(!is_object($result)){
	die("No users found");
    }

session_start();


if($_SESSION["staffid"]==true)
{

include("header.php");

include("checkuser.php");
include("connect.php");
 
$rows=$result->fetch_assoc();
?>

	<ol class="breadcrumb">
	            
                <center><li class="breadcrumb-item"><h4><a href="">Student Profile</a></h4></li></center>
            </ol>

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      <h3> <?php echo $rows['name']?> Profile</h3>
				<div class="col-md-6 agileits-w3layouts">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><b>Title</b></th>
								<th><b>Information</b></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Photo</td>
								<td><span class=" "><img src="/sms/staff/controller/<?php echo $rows['img']?>" width="100" height="95"></span></td>
							</tr>
							<tr>
								<td>Student Id</td>
								<td><span class=""><?php echo $rows['studentid']?> </span></td>
							</tr>
							<tr>
								<td>Name</td>
								<td class="ce" onBlur="edit(this,'name','<?php echo $rows['id']?>','student')"><?php echo $rows['name']?></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td ><span><?php echo $rows['gender']?></span></td>
							</tr>
							<tr>
								<td>Date of birth</td>
								<td class="ce" onBlur="edit(this,'dob','<?php echo $rows['id']?>','student')"	><?php echo $rows['dob']?></td>
							</tr>
							
							<tr>
								<td>Course</td>
								<td class="ce" onBlur="edit(this,'course','<?php echo $rows['id']?>','student')"><?php echo $rows['course']?></td>
							</tr>
							<tr>
								<td>Class</td>
								<td class="ce" onBlur="edit(this,'class','<?php echo $rows['id']?>','student')"><?php echo $rows['class']?></td>
							</tr>
							<tr>
								<td>Total Fees</td>
								<td class="ce" onBlur="edit(this,'totalfees','<?php echo $rows['id']?>','student')"><?php echo $rows['totalfees']?></td>
							</tr>
							<tr>
								<td>Mobile</td>
								<td class="ce" onBlur="edit(this,'phone','<?php echo $rows['id']?>','student')"><?php echo $rows['phone']?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td class="ce" onBlur="edit(this,'email','<?php echo $rows['id']?>','student')"><?php echo $rows['email']?></td>
							</tr>
							<tr>
								<td>Address</td>
								<td class="ce" onBlur="edit(this,'address','<?php echo $rows['id']?>','student')"><?php echo $rows['address']?></td>`
							</tr>
							<tr><td><button class="btn bg-alert dark text-white " id="enableedit"><a href="#">Quick Edit </a></button></td>
							<td><button class="btn btn-dark text-white "><a href="#" onclick="delete1('<?php echo $rows['id']?>','student'),confirm('Are you sure you wish to delete this Record?');">Delete </a> </button></td></tr>
						</tbody>
					</table> 
					<div class="col-md-6" id="msg"></div>                   
				</div>
				<div class="col-md-6 agileits-w3layouts">
					
			
			 <div class="clearfix"> </div>
			<p><b> <h4>Change Profile Picture </h4></b></p>
			<div class="list-group list-group-alternate"> 
		    <form method="post" id="photofrm" enctype="multipart/form-data">
		    	<input type="hidden" name="id" id="id" value="<?php echo $rows['id']?>">
         	 <div class="col-md-12 form-group1 group-mail">
              <label class="control-label ">File</label>
              <input type="file"  name="file" id="file" required="">
            </div>
			
            <div class="col-md-6 form-group">
              <input type="submit" name="okay" value="Update" id="photobtn" class="btn btn-primary">
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			</form>
            
            </div>
            </div>
			<div class="col-md-6" id="pass"></div>
			</div>
				
            <div class="clearfix"> </div>
			
            </div>
			
			   

</div>
</div>
</div>


<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); 

	?>
	<?php } 
else
	header('location:login.php');

?>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

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
                  window.location.href = 'student.php';
                } 
              }
            })
          }
$(document).ready(function(){
      $("#photobtn").click(function(){
        $("#photofrm").validate({
          submitHandler:function(){
            var formData = new FormData();
            formData.append('image', $('#file')[0].files[0]);
            var staffid = $("#id").val();
            
            formData.append('tab','student');
            formData.append('staffid',staffid);
            
            $.ajax({
              url:"/sms/staff/controller/changephoto.php",
              type:"POST",
              processData: false,
                  contentType: false,
              data:formData,
              success:function(response){
                if(response==1){

                  $("#pass").fadeIn(1000);
                  $("#passfrm")[0].reset(); 
                  $("#pass").removeClass('alert alert-danger');
                  $("#pass").addClass('alert alert-success').html("Data Add Successful.");
                  setTimeout(function(){
                    $("#pass").fadeOut(1000);
                  },4000);
                } else {
                  $("#pass").fadeIn(1000);
                  //$("#regfrm")[0].reset(); 
                  $("#pass").removeClass('alert alert-success');
                  $("#pass").addClass('alert alert-danger').html(response);
                  setTimeout(function(){
                    $("#pass").fadeOut(1000);
                  },4000);
                }

              }
            })
          }
        });
      });
    });
</script>
</html>