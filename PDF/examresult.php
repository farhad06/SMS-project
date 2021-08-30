 <?php
require_once 'pdf.php';


if(isset($_GET['code'])){
    $examcode = $_GET['code'];
    /*var_dump($examcode);
    exit();*/
  }
  include ('../staff/model/table.class.php');
	$table = new TableViews;
	$tab = "exam";
    $result = $table->viewdata("$tab","examcode","$examcode");
    if(!is_object($result)){
	  die("No users found");
    }
    $row=$result->fetch_assoc();
    $stid = $row['sid'];
    //echo "$stid";
    $student = new TableViews;
	  $tab = "student";
    $stresult = $student->viewdata("$tab","id","$stid");
    //var_dump($stresult);
    if(!is_object($stresult)){
	  die("No users found");
    }
    $st=$stresult->fetch_assoc();
    //var_dump($st["name"]); 
   
//exit();
$output = '';

$output .= '
   <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
     <td colspan="2" align="center" style="font-size:18px"><b>Exam Result</b></td>
    </tr>
    <tr>
     <td colspan="2">
     <table width="100%" cellpadding="5">
       <tr>
        <td width="70%">
         <b>GitaRam Institute of Managememnt</b><br />
         NH-34, Radharghat<br />
         Murshidabad, Berhampore<br /> 
         West Bengal 742187
         <br />
        </td>
        <td width="30%">
        <img src="logo.jpg" width="120px" height="120px">
        </td>
       </tr>
      </table>
      <table width="100%" cellpadding="5">
       <tr>
        <td width="60%">
         
         <b>'.$st["name"].'</b><br />
         Student ID : '.$st["studentid"].'<br /> 
         Class : '.$st["class"].'<br />
         Course : '.$st["course"].'<br />
        </td>
        <td width="40%">
         Exam ID : '.$row["examcode"].'<br />
         Exam Date : '.$row["examdate"].'<br />
         Test Name : '.$row["examname"].'<br />
         Exam Mode : '.$row["mode"].'<br />
        </td>
       </tr>
      </table>
      <br/>
      <table width="100%" border="1" cellpadding="10" cellspacing="0">
       <tr>
        <th>Total Question</th>
        <th>'.$row["total_qus"].'</th>
        </tr>
       <tr>
        <th>Question Attempt</th>
        <th>'.$row["attempt_qus"].'</th>
        </tr>
        <tr>
        <th>Question Not Attempt</th>
        <th>'.$row["noanswer"].'</th>
        </tr>
        <tr>
        <th>Total Marks</th>
        <th>'.$row["totalmarks"].'</th>
        </tr>
       <tr>
        <th>Right Answer</th>
        <th>'.$row["rightanswer"].'</th>
        </tr>
        <tr>
        <th>Wrong Answer</th>
        <th>'.$row["wrong"].'</th>
        </tr>
        <tr>
        <th>Your Score</th>
        <th style="color: red">'.$row["marksobtain"].'</th>
        </tr>
        <tr>
        <th>Result in Percentage</th>
        <th style="color: red">'.$row["per"].' %</th>
        </tr>
       
     </table>
    </tr>
   </table>
  ';
 $pdf = new Pdf();
 $file_name = 'Result-'.$row["sid"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));

?>