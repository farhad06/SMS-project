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
	$table = new TableViews;
    $result = $table->viewdata("$empid");
    /*if(!is_object($result)){
	die("No users found");
    }*/

session_start();


if($_SESSION["userid"]==true)
{

include("header.php");

include("checkuser.php");
include("connect.php");
 
$rows=$result->fetch_assoc();
?>

	<ol class="breadcrumb">
	            
                <center><li class="breadcrumb-item"><h4><a href="">Staff Profile</a></h4></li></center>
            </ol>

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      <h3> Admin Profile</h3>
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
								<td><span class=" "><a href="/SMS/admin/controller/<?php echo $_SESSION['staff']['img']?>"><img src="/SMS/admin/controller/<?php echo $_SESSION['staff']['img']?>" width="100" height="100"></a></span></td>
							</tr>
							<tr>
								<td>Employee Id</td>
								<td><span class=""><?php echo $rows['empid']?> </span></td>
							</tr>
							<tr>
								<td>Name</td>
								<td class="ce" onBlur="edit(this,'name','<?php echo $rows['id']?>','staff')"><span class=""><?php echo $rows['name']?></span></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td ><span><?php echo $rows['gender']?></span></td>
							</tr>
							<tr>
								<td>Date of birth</td>
								<td class="ce" onBlur="edit(this,'dob','<?php echo $rows['id']?>','staff')"	><span class=""><?php echo $rows['dob']?></span></td>
							</tr>
							
							<tr>
								<td>Staff Category</td>
								<td class="ce" onBlur="edit(this,'staff_category','<?php echo $rows['id']?>','staff')"><span><?php echo $rows['staff_category']?></span></td>
							</tr>
							<tr>
								<td>Staff Department</td>
								<td class="ce" onBlur="edit(this,'deptname','<?php echo $rows['id']?>','staff')"><span><?php echo $rows['deptname']?></span></td>
							</tr>
							<tr>
								<td>Highest Qualification</td>
								<td class="ce" onBlur="edit(this,'qualification','<?php echo $rows['id']?>','staff')"><span><?php echo $rows['qualification']?></span></td>
							</tr>
							<tr>
								<td>Salary</td>
								<td class="ce" onBlur="edit(this,'salary','<?php echo $rows['id']?>','staff')"><span><?php echo $rows['salary']?></span></td>
							</tr>
							<tr>
								<td>Mobile</td>
								<td class="ce" onBlur="edit(this,'phone','<?php echo $rows['id']?>','staff')"><span class=""><?php echo $rows['phone']?></span></td>
							</tr>
							<tr>
								<td>Email</td>
								<td class="ce" onBlur="edit(this,'email','<?php echo $rows['id']?>','staff')"><span class=""><?php echo $rows['email']?></span></td>
							</tr>
							<tr>
								<td>Address</td>
								<td class="ce" onBlur="edit(this,'address','<?php echo $rows['id']?>','staff')"><span class=""><?php echo $rows['address']?></span></td>
							</tr>
							<tr><td><button class="btn bg-alert dark text-white " id="enableedit"><a href="#"> Edit </a></button></td>
							<td><button class="btn btn-dark text-white "><a href="#" onclick="delete1('<?php echo $rows['id']?>','staff'),confirm('Are you sure you wish to delete this Record?');">Delete </a> </button></td></tr>
						</tbody>
					</table> 
					<div class="col-md-6" id="msg"></div>                   
				</div>
				<div class="col-md-6 agileits-w3layouts">
					
			
			 <div class="clearfix"> </div>
			<p><b> <h4>Change Profile Picture </h4></b></p>
			<div class="list-group list-group-alternate"> 
		    <form method="post" action="new_dp.php" enctype="multipart/form-data">
         	 <div class="col-md-12 form-group1 group-mail">
              <label class="control-label ">File</label>
              <input type="file"  name="ufile" required="">
            </div>
			
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="save"><a  href = "">Update</a></button>
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			</form>
            
            </div>
            </div>
			
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
                  window.location.href = 'te_staff.php';
                } 
              }
            })
          }

</script>
</html>