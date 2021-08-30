<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

<?php

require_once("encript_dcrypt.php"); 
require_once("phpmailer/class.phpmailer.php");

$con = mysqli_connect("localhost","agrasain_abs2012","abs20162017","agrasain_abss") or die(mysqli_error($con));

#mysql_select_db("agrasain_live") or die(mysql_error()); 

date_default_timezone_set("Asia/Kolkata");

 ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Agrasain Boy's School</title>

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>

<script type="text/javascript" src="js/jquery.validate.js"></script>

<!--<script src="js/validate_careers.js" type="text/javascript">

</script>-->





<script type="text/javascript">

$(document).ready(function() {



  $( ".dHolder" ).delay(1200).animate({marginTop:"+=131px"}, 'slow');

	$('#dTop').click(function() {

		

		if($('.dHolder').css('margin-top')=="131px"){

			$('.dHolder').animate({marginTop:"0px"},'slow');

		}else{

			$('.dHolder').animate({marginTop:"+=131px"},'slow');

		}

		//$('.dHolder').slideUp('slow')

		return false;

	});

	

	

	//Accordian level

	$('div.accordbody').hide();

	

	$('.head1').click(function(){

		$('.accordbody').slideUp('slow');

		$('.head1').removeClass('prodetail_headactive');

		var elem = $(this).next('div.accordbody');

		

		if(elem.is(':visible')){  

			elem.slideUp('slow')

			elem.prev().removeClass('prodetail_headactive');

		}else{ 

			elem.slideDown('slow')

			elem.prev().addClass('prodetail_headactive');

			

		}

	})

	$('div.accordbody').first().show()

	$('div.head1').first().addClass('prodetail_headactive');

	

	//Accordian level

	

	//Accordian level 2

	$('div.schoolbody').hide();

	

	$('.schead').click(function(){

		$('.schoolbody').slideUp('slow');

		$('.schead').removeClass('prodetail_headactive');

		var elem = $(this).next('div.schoolbody');

		

		if(elem.is(':visible')){  

			elem.slideUp('slow')

			elem.prev().removeClass('prodetail_headactive');

		}else{ 

			elem.slideDown('slow')

			elem.prev().addClass('prodetail_headactive');

			

		}

	})

	$('div.schoolbody').first().show()

	$('div.schead').first().addClass('prodetail_headactive');

	

	//Accordian level 2

	

	//tab script

	

	//When page loads...

	$(".tab_content").hide(); //Hide all content

	$("ul.tabs li a:first").addClass("active").show(); //Activate first tab

	$(".tab_content:first").show(); //Show first tab content



	//On Click Event

	$("ul.tabs li a").click(function() {



		$("ul.tabs li a").removeClass("active"); //Remove any "active" class

		$(this).addClass("active"); //Add "active" class to selected tab

		$(".tab_content").hide(); //Hide all tab content



		var activeTab = $(this).attr("rel"); //Find the href attribute value to identify the active tab + content

		//alert(activeTab);

		$(activeTab).fadeIn(); //Fade in the active ID content

		return false;

	});



	

	

});

</script>









<!--jcarousel script start-->



<script type="text/javascript" src="Carousel/jquery.jcarousel.min.js"></script>

<!--<script type="text/javascript" src="js/myjs.js"></script>-->

<link rel="stylesheet" type="text/css" href="Carousel/scroll.css" />

<link rel="stylesheet" type="text/css" href="Carousel/scroll2.css" />

<link href="css/mystyle.css" rel="stylesheet" type="text/css" />



<script type="text/javascript">



jQuery(document).ready(function() {

    jQuery('.jcarousel-skin-tango,.jcarousel-skin-tango2').jcarousel({

    	wrap: 'circular', auto:0, animation:'slow'

    });

	

});



</script>



<!--jcarousel script end-->





<script type="text/javascript">

			

			

	//image resize to resolution

	

	var images;



	$(function() {  

		images = $('img.wp-post-image');

		removeSize();

	});



	$(window).resize(removeResize);

	

	function removeSize()

	{

		if($(window).width() < 1000 && images.length > 0)

		{

			images.removeAttr('width').removeAttr('height');

		}

	}

	//image resize to resolution

			

</script>





</head>



<body>



<!--Top Panel start-->

<div class="top_container">

	<table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td style="background:url(images/toplogobg_left.jpg) no-repeat 100% 0;">&nbsp;</td>

        <td style="width:100px;">

        	<div class="top_bgpanel">

            <div class="toppanel">

            <div class="toplogodiv"><a href="index-2.html"><img src="images/logo.png"/></a>

            </div>

            <div class="clear"></div>

    </div>

</div>        </td>

        <td>&nbsp;</td>

      </tr>

    </table>

	

    <!--top menu panel start-->

    

        <div class="topmenu_panel">

       	  <div class="menu">

            	<ul class="nav">

                	<li><a href="index.php">Home</a></li>

                    <li><a href="about_us.php">About Us</a>

                    	<ul class="sub">

                           	<li><a href="concept.php">Concept</a></li>

                            <li><a href="gov_body.php">Governing Council</a></li>

                            <li><a href="aim_obj.php">Aims &amp; Objectives</a></li>

                            <li><a href="messages.php">Messages</a>

                            <ul class="sub2">                       

                            	<li><a href="chairman_msg.php">Chairman&rsquo;s Message</a></li>

                            	<li><a href="director_msg.php">Directors&rsquo;s Message</a></li>

                            	<li><a href="ceo_msg.php">Principal&rsquo;s Message</a></li>

                           </ul>

                            </li>                            

                        </ul>

                    </li>

                    <li><a href="#">Our Team</a>

                            <ul class="sub">

                            <li><a href="anchor.php">Anchors</a></li>

                            <li><a href="administrativestaff.php">Administrative Team</a></li>

                            <li><a href="faculty_info.php">Our Faculty</a></li>

                            <li><a href="sup_staff.php">Supporting Team</a></li>

                           </ul>

                    </li>

                    

                    </li>

                    <li><a href="#">Scholastic</a>

                     <ul class="sub">

                            <li><a href="syllabus.php">Syllabus</a></li>

                            <li><a href="exm_schedule.php">Exam Schedule</a></li>

                            <li><a href="doc_abs/School_calendar_2015.pdf" target="_blank">School Calendar</a></li>

                            <li><a href="rules_regulations.php">Rules &amp; Regulations</a></li>

                            <li><a href="school_timings.php">School Timings</a></li>

                            <li><a href="uniforms.php">Uniforms</a></li>

                        </ul>

                    </li>

                    <li><a href="#">Infrastructure</a>

                    <ul class="sub">

                           <li><a href="classrooms.php">Classroom</a></li>

                            <li><a href="s_classrooms.php">Smart Classroom</a></li>

                            <li><a href="seminar_hall.php">Seminar Room</a></li>

                            <li><a href="library.php">Library</a></li>

                            <li><a href="computer_lab.php">Computer Lab</a></li>

                            <li><a href="playground.php">Playground</a></li>

                            <li><a href="science_lab.php">Science Lab</a></li>

                        </ul>

                    </li>

                    <li><a href="#">Co-Scholastic</a>

                    <ul class="sub">

                            <li><a href="house_sys.php">House Systems</a></li> 

                            <li><a href="sports_act.php">Sports Activities</a></li>

                            <li><a href="art_craft.php">Art &amp; Craft</a></li>

                            <li><a href="other_act.php">Other Activities</a></li>

                            <li><a href="teachers_workshop.php">Teacher's Workshop</a></li>

                            <li><a href="trips_excursion.php">Trips &amp; Excursion</a></li>

                    </ul>

                    </li>

                    <li><a href="#">Media</a>

                    <ul class="sub">

                            <li><a href="photo_galary.php">Photo Gallery</a></li>

                            <li><a href="news_letter.php">News Letter</a></li>

                    </ul>

                    </li>

                    <li><a href="careers.php" class="active">Careers</a></li>

                    <li><a href="#" class="last">Reach Us</a>

                     <ul class="sub">

                            <li><a href="contact_info.php">Contact Information</a></li>

                            <li><a href="location_map.php">Location Map</a></li>

                      </ul>

                    </li>

                    <div class="clear"></div>

                </ul>

            </div>

        </div>

        <!--top menu panel end-->

</div>

<!--Top Panel end-->



<!--Header Panel start-->

<div class="content_headerdiv_outer">

<div class="content_headinner">



<img src="images/cont_header.jpg" alt="" class="wp-post-image" />



</div>



</div>

<!--Header Panel end-->



<div class="bodycontainer">

	<div class="topcurve_div"></div>

    

    <!--body middle panel start-->

    <div>

    	<!--Body content left panel div start-->

    	<script type="text/javascript" language="javascript">

$(document).ready(function(){

	

	var page_url = window.location.href;

	var segment_arr = page_url.split("index.html");

	var segment_count = segment_arr.length;

	var page_name = segment_arr[segment_count-1];

	

	

	

	$('.active_link').each(function(){ 

		var href_link = $(this).attr('href'); //alert(href_link)

		if(href_link == page_name){

			//$(this).addClass('left_active');

			//var elem = $(this).parent().find('.accordion_holder');

			$('.accordion_holder .accordbody').hide();

			$(this).parent().parent().parent().show();

		}

	});

	

	

});

</script>



        <!--Body content right div start-->

    	<div class="content_rightdiv">

        	<div class="contentdiv equalH">

            <h1 align="center">Application Form</h1>

         	<h4><a href="get_form.php">Click here to download PDF if you have already registered</a></h4>

             <!--<h4><strong><a href="con_to_pdf_code.php" target="_blank">Click here to convert previous updated Dataform to PDF Format</a></strong></h4> -->

                <h2><strong>Application for KG Admission</strong></h2>

                <h2>Personal Data Form :</h2>

               
                 
                 
                 <form name="appletter" method="post" id="appletter">

                <table cellpadding="5" cellspacing="0" class="tab" style="text-align:left">

                <tr valign="top">

                <td width="242" height="56">Name of Pupil</td>

                <td width="236"><input type="text" name="fname" placeholder="Full Name" id="fname"/>

              

                </td>

                <td width="302" style="padding-left:30px;">Date of Birth</td>

                <td width="271"><input type="text" name="dob" placeholder="Date of Birth" id="dob" />

               </td>

                </tr>

                <tr valign="top">

                <td>Blood Group</td>

               	<td><input type="text" name="bg" placeholder="Blood Group" id="bg" />

                </td>

                <td style="padding-left:30px;">Name of Father</td>

                <td colspan="3"><input type="text" name="nof" placeholder="Full Name of Father" id="nof">

                </td>

                </tr>

               

                <tr valign="top">

                <td>Residential Address</td>

              	<td valign="top"><textarea name="r_addr" cols="20" rows="5" id="r_addr"></textarea>

                </td>

                <td style="padding-left:30px;">Office Address</td>

                <td valign="top"><textarea name="o_addr" cols="20" rows="5" id="o_addr"></textarea></td>

                </tr>

                <tr valign="top">

                <td>Email</td>

                <td><input type="text" name="email" placeholder="Email Address" id="email" />

                </td>

                <td style="padding-left:30px;">Mobile No</td>

                <td><input type="text" name="mob_no" placeholder="Mobile Number" id="mob_no" maxlength="10" />

                </td>

                

                </tr>

                <tr>

                <td style="">Educational Qualification (Father's)</td>

                <td> <input type="radio" name="feq" value="X" id="feq" />X

             	<input type="radio" name="feq" value="XII" id="feq" />XII

                <input type="radio" name="feq" value="Graduate" id="feq" />Graduate

                <input type="radio" name="feq" value="Post-Graduate" id="feq" />Post-Graduate</td>

                <td>Occupation &amp; Post Held</td>

                <td><input type="text" name="focc" placeholder="Father's Occupation" id="focc" />

               </td>

                </tr>

                <tr valign="top">

                <td>Name of Mother</td>

                <td><input type="text" name="mname" placeholder="Motehr's Name" id="mname" />

               </td>

                <td style="padding-left:30px;">Educational Qualification (Mother's)</td>

                <td> <input type="radio" name="meq" value="X" id="meq" />X

             	<input type="radio" name="meq" value="XII" id="meq" />XII

                <input type="radio" name="meq" value="Graduate" id="meq" />Graduate

                <input type="radio" name="meq" value="Post-Graduate" id="meq" />Post-Graduate</td>

                </tr><tr>

                <td>Occupation &amp; Post Held</td>

                <td><input type="text" name="mocc" placeholder="Mother's Occupation" id="mocc" />

                </td>

                </tr>

                

               

                <tr valign="top">

                <td>Residential Address</td>

              	<td valign="top"><textarea name="mr_addr" cols="20" rows="5" id="mr_addr"></textarea>

                </td>

                <td style="padding-left:30px;">Office Address</td>

                <td valign="top"><textarea name="mo_addr" cols="20" rows="5" id="mo_addr"></textarea></td>

                </tr>

                

                <tr valign="top">

                <td>Email</td>

                <td><input type="text" name="memail" placeholder="Mother's Email Address" id="memail" />

                </td>

                <td style="padding-left:30px;">Mobile Number</td>

                <td><input type="text" name="mmob" placeholder="Mother's Mobile Number" id="mmob" maxlength="10" />

               </td>

                </tr>

                </table>

                <br />

                <table>

                <tr>

                <td><h2>Local Guardian's Information :</h2>

</td>

                </tr>

                </table>

         

                <table cellpadding="5" cellspacing="0" class="tab" style="text-align:left">

                  <tr valign="top">

                    <td width="324">Name of Guardian</td>

                    <td width="270"><input type="text" name="gname" placeholder="Full Name" id="gname"/>

                      </td>

                    <td width="209" style="padding-left:30px;">Relationship with child</td>

                    <td width="144"><input type="text" name="rwc" placeholder="Relation" id="rwc" />

                      </td>

                  </tr>

                  <tr valign="top">

                    <td>No of Members in Family</td>

                    <td valign="top"><input type="text" name="nom" id="nom" />

                      </td>

                    <td style="padding-left:30px;">Office Address</td>

                    <td valign="top"><textarea name="goaddr" cols="20" rows="5" id="goaddr"></textarea>

                      </td>

                  </tr>

                  <tr valign="top">

                    <td>Email</td>

                    <td><input type="text" name="gemail" placeholder="Email Address" id="gemail" />

                      </td>

                    <td style="padding-left:30px;">Mobile No</td>

                    <td><input type="text" name="gmob" placeholder="Mobile Number" id="gmob" maxlength="10" />

                      </td>

                  </tr>

                  <tr>

                    <td style="">Educational Qualification (Guardian's)</td>

                    <td> <input type="radio" name="geq" value="X" id="ggeq" />X

             	<input type="radio" name="geq" value="XII" id="geq" />XII

                <input type="radio" name="geq" value="Graduate" id="geq" />Graduate

                <input type="radio" name="geq" value="Post-Graduate" id="geq" />Post-Graduate</td>

                    <td>Occupation &amp; Post Held</td>

                    <td><input type="text" name="gocc" placeholder="Occupation" id="gocc" />

                      </td>

                  </tr>

                </table>

                <h2>Student's Infromation:</h2>

                <table cellpadding="5" cellspacing="0" class="tab" style="text-align:left">

                  <tr valign="top">

                    <td width="324">Nationality of Student</td>

                    <td width="270"><input type="text" name="nationality" placeholder="Nationality" id="nationality"/>

                      </td>

                    <td width="209" style="padding-left:30px;">Last School Attended</td>

                    <td width="144"><input type="text" name="lsa" placeholder="Last School Attended" id="lsa" />

                      </td>

                  </tr>

                  <tr valign="top">

                    

                    <td>Mode of Transport</td>

                    <td valign="top">

                    <input type="radio" name="mot" placeholder="Mode of Transport" id="mot" value="Bus" />Bus
                    <input type="radio" name="mot" placeholder="Mode of Transport" id="mot" value="Pool" />Pool Car
                    <input type="radio" name="mot" placeholder="Mode of Transport" id="mot" value="Van" />Van
                    <input type="radio" name="mot" placeholder="Mode of Transport" id="mot" value="Train" />Train
                    <input type="radio" name="mot" placeholder="Mode of Transport" id="mot" value="Parents" />Parents
                    <input type="radio" name="mot" placeholder="Mode of Transport" id="mot" value="Others" />Others</td>

                    <td style="padding-left:30px;">Registration ID</td>

                    <td valign="top">

                    <input type="text" name="reg_id" placeholder="Registration ID" id="reg_id" /></td>

                  </tr>

                  <tr valign="top">

                    <td>Mother Tongue</td>

                    <td><input type="text" name="smt" placeholder="Mother Tongue" id="smt" />

                      </td>

                    <td style="">Caste</td>

                    <td><input type="radio" name="caste" value="General" id="caste" />

                      General

                      <input type="radio" name="caste" value="SC" id="caste" />

                      SC

                      <input type="radio" name="caste" value="ST" id="caste" />

                      ST

                      <input type="radio" name="caste" value="OBC" id="caste" />

                      OBC</td>

                  </tr>

                  <tr>

                    <td style="">Religion</td>

                    <td><input type="text" name="religion" id="religion" />

                      </td>

                    <td>Monthly Income of Parents</td>

                    <td><input type="text" name="mip" placeholder="Monthly Income of Parents" id="mip" />

                      </td>

                  </tr>

                  <tr>

                  <td>Do both parents earn?</td>

                    <td><input type="radio" name="earnings" placeholder="" id="earnings" value="Y" />Yes&nbsp;

                    <input type="radio" name="earnings" placeholder="" value="N" id="earnings" />No

                    

                      </td>

                    <td>Any Query</td>

                    <td><input type="text" name="problem" placeholder="Any Query?" id="problem" />

                      </td>

                    <td>&nbsp;</td>

                    <td>&nbsp;</td>

                  </tr>

                </table>

                <p>&nbsp;</p>

                

               

                <table>

                <tr>

                <td><input type="submit" name="btn-save" id="btn" value="" class="submitbtn"/></td>

                

               <!-- <td><input type="reset" class="resetbtn" /></td>-->

                </tr>

                </table>

                 </form>

                 <div id="msg">&nbsp;

                 

                 <?php if(isset($_POST['btn-save'])){
						#echo 'Reg id missing';
					 if(!empty($_POST['reg_id'])){

						 $v = mysqli_query($con,"SELECT * FROM `selected_students` WHERE `Registration ID` = '".$_POST['reg_id']."' AND `Mobile No` = '".$_POST['mob_no']."'") or die(mysqli_error());

						 if(mysqli_num_rows($v) === 0){

							 ?><script> alert('Invalid ID : Please check your Registartion ID or mobile number and try again');window.location.href = 'form.php';</script><?php
							echo 'Invalid';
						 	exit();

						 }
						 

						 

					 

					 $saveAll = mysqli_query($con,"UPDATE selected_students SET `Student Name` = '".strtoupper($_POST['fname'])."',`dob` = '".$_POST['dob']."',`bg`='".strtoupper($_POST['bg'])."',`Father's Name` = '".strtoupper($_POST['nof'])."',`fraddr` = '".strtoupper($_POST['r_addr'])."',`foaddr` = '".strtoupper($_POST['o_addr'])."',`femail` = '".$_POST['email']."',`Mobile No` = '".$_POST['mob_no']."',`feq` = '".$_POST['feq']."',`focc` = '".strtoupper($_POST['focc'])."',`mname` = '".strtoupper($_POST['mname'])."',`meq` = '".$_POST['meq']."',`mocc` = '".$_POST['mocc']."',`mraddr` = '".strtoupper($_POST['mr_addr'])."',`moaddr` = '".strtoupper($_POST['mo_addr'])."',`memail` = '".$_POST['memail']."',`mmob` = '".$_POST['mmob']."',`gname` = '".strtoupper($_POST['gname'])."',`rwc` = '".strtoupper($_POST['rwc'])."',`goaddr` = '".strtoupper($_POST['goaddr'])."',`nom` = '".$_POST['nom']."',`gmob` = '".$_POST['gmob']."',`geq` = '".$_POST['geq']."',`gocc` = '".strtoupper($_POST['gocc'])."',`religion` = '".strtoupper($_POST['religion'])."',`caste` = '".strtoupper($_POST['caste'])."',`monthlyincomep` = '".$_POST['mip']."',`modeofcon` = '".$_POST['mot']."',`mtongue` = '".strtoupper($_POST['smt'])."',`schoolattended` = '".strtoupper($_POST['lsa'])."',`nationality` = '".strtoupper($_POST['nationality'])."',`bothearn` = '".$_POST['earnings']."',`problem` = '".strtoupper($_POST['problem'])."' WHERE `Registration ID` = '".$_POST['reg_id']."'") or die(mysqli_error($con));

					 

					 if($saveAll){

					 	?><script> alert('Your information has been saved successfully!!!..You will be re-directed to view and download the generated PDF'); window.location.href = "getpdf.php?reg_id=<?php echo encrypt_decrypt('encrypt',$_POST['reg_id']);?>";</script><?php
						
						#SEND MAIL
						
						$mail             = new PHPMailer();

#$body             = file_get_contents('contents.html');
#$body             = eregi_replace("[\]",'',$body);
$body = "<p style='color:blue'>Your registration is complete</p>";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.gmail.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "joydeep@ardentcollaborations.com";  // GMAIL username
$mail->Password   = "tuffg*yjoy90*";            // GMAIL password

$mail->SetFrom('joydeep@ardentcollaborations.com', 'Joydeep Banerjee');

#$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject    = "Agrasain Boys School";

#$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $_POST['email'];
$mail->AddAddress($address, $_POST['email']);

#$mail->AddAttachment("images/phpmailer.gif");      // attachment
#$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} 

						

					 }

					 else{

						 echo mysqli_error();

					 }

					 }

				 }?>

                 </div>


        

               

       

            </div>

            

        </div>

        <!--Body content right div end-->

        

        

    	<div class="clear"></div>

    </div>

    <!--body middle panel end-->

</div>



<!--Footer Panel start-->





<div class="mainfooterarea">

	

    

    <div class="footerlinks_outer">

    	 <div class="footerlinks">

        	 <p class="copytext">&copy;Copyright 2016 Agrasain Boys School. All rights are reserved</p>

             <p class="linktext">Developed By <a href="http://www.ardentcollaborations.com/" target="_blank">Ardent Development Team</a></p>

         </div>

         <div class="clear"></div>

    </div>

</div>

<!--Footer Panel end-->




<style type="text/css">
label.error{
	color:#F00;
	background:#FC9;
	display: inline-block;
    margin-right: 2em;
    padding-top: .5px;
	
}
table tr{
	height:50px;
	}
</style>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="validate.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script>
			 	$(document).ready(function() {
					$("#dob").datepicker({

		changeMonth:true,

		changeYear:true,

		yearRange: "-100:+0",

		});
					
                    $("#btn").click(function(){
					
						$("#appletter").validate({
							rules:{
								fname:{
									required:true
								},
								dob:{
									required:true
								},
								bg:{
									required:true
								},
								nof:{
									required:true
								},
								r_addr:{
									required:true
								},
								o_addr:{
									required:true
								},
								email:{
									required:true,
									email:true
								},
								mob_no:{
									required:true,
									number:true,
									minlength:10
								},
								feq:{
									required:true
								},
								focc:{
									required:true
								},
								mname:{
									required:true
								},
								meq:{
									required:true
								},
								mocc:{
									required:true
								},
								mr_addr:{
									required:true
								},
								mo_addr:{
									required:true
								},
								memail:{
									required:true,
									email:true
								},
								mmob:{
									required:true,
									number:true,
									minlength:10
								},
								gname:{
									required:true
								},
								rwc:{
									required:true
								},
								nom:{
									required:true
								},
								goaddr:{
									required:true
								},
								gemail:{
									required:true,
									email:true
								},
								gmob:{
									required:true,
									number:true,
									minlength:10
									
								},
								geq:{
									required:true
								},
								gocc:{
									required:true
								},
								sn:{
									required:true
								},
								lsa:{
									required:true
								},
								mot:{
									required:true
								},
								reg_id:{
									required:true,
									minlength:12
									
								},
								smt:{
									required:true
								},
								caste:{
									required:true
								},
								religion:{
								
									required:true
								},
								nationality:{
									required:true
								},
								mip:{
									required:true
								},
								problem:{
									required:true
								},
								earnings:{
									required:true
								},
								
								
							}
						
						})
					
					
					})
                });
			 </script>
</body>

</html>

