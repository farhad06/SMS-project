 <?php
require_once 'pdf.php';


if(isset($_GET['id'])){
    $memono = $_GET['id'];
    /*var_dump($memono);
    exit();*/
  }
   include ('../staff/model/table.class.php');
  $table = new TableViews;
  $tab = "certificate";
    $result = $table->viewdata("$tab","memono","$memono");
    
    $row=$result->fetch_assoc();
    $stid = $row['sid'];
    //echo "$stid";
    $student = new TableViews;
    $tab = "student";
    $stresult = $student->viewdata("$tab","id","$stid");
    //var_dump($stresult);
    $st=$stresult->fetch_assoc();
    
$output = '';

$output .= '
   <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
     <td colspan="2" align="center" style="font-size:18px"><b>'.$row["type"].'</b></td>
    </tr>
    <tr>
     <td colspan="2">
     <table width="100%" cellpadding="5">
       <tr>
        <td width="100%">
        <center>
         <h1>GitaRam Institute of Managememnt</h1>
         Murshidabad, Berhampore<br /> 
         <img src="logo.jpg" width="120px" height="120px">
         </center>
        </td>

       </tr>
      </table>
      <table width="100%" cellpadding="5">
       <tr>
        <td width="60%">
         To,<br />
         <b>'.$st["name"].'</b><br />
         Student ID : '.$st["studentid"].'<br /> 
         Class : '.$st["class"].'<br />
         Course : '.$st["course"].'<br />
        </td>
        <td width="40%">
         Memo Number : '.$row["memono"].'<br />
         Date : '.$row["approvedate"].'<br />
        </td>
       </tr>
      </table>
      <br/>
         
     </td>
    </tr>
   </table>
  ';
$pdf = new Pdf();
 $file_name = 'certificate-'.$row["memono"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
?>
 