 <?php
require_once 'pdf.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    //var_dump($txnid);
  }
    include ('../staff/model/helper.class.php');
	$table = new idfind;
	$tab = "notice";
    $result = $table->viewtab("$tab","$id");
    if(!is_object($result)){
	die("No users found");
    }
    $row=$result->fetch_assoc();
    $title = $row['title'];
    $description = $row['description'];
    $publishdate = $row['publishdate'];
    //echo "$publishdate";
    //exit();
    
$output = '';

$output .= '
   <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
     <td colspan="2" align="center" style="font-size:18px"><b>NOTICE</b></td>
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
        </td>
        <td width="30%">
        <img src="logo.jpg" width="120px" height="120px">
        </td>
       </tr>
      </table>
      <table width="100%" cellpadding="5">
       <tr>
        <td width="75%">
         Title : <b>'.$row["title"].'</b><br /> 
         
        </td>
        <td width="25%">
        Published Date : '.$row["publishdate"].'<br />
        </td>
       </tr>
      </table>
      <table width="100%" border="1" cellpadding="5" cellspacing="0">
       <tr>
        <td>
        '.$row["description"].'
        </td>
       </tr>

     </table>
 
     </td>
    </tr>
   </table>
  ';
$pdf = new Pdf();
 $file_name = 'Notice-'.$row["id"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));

?>
 