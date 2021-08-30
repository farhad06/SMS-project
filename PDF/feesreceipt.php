 <?php
require_once 'pdf.php';


if(isset($_GET['txnid'])){
    $txnid = $_GET['txnid'];
    //var_dump($txnid);
  }
    include ('../staff/model/table.class.php');
	$table = new TableViews;
	$tab = "fees";
    $result = $table->viewdata("$tab","txnid","$txnid");
    if(!is_object($result)){
	die("No users found");
    }
    $row=$result->fetch_assoc();
    $stid = $row['studentid'];
    //echo "$stid";
    $student = new TableViews;
	$tab = "student";
    $stresult = $student->viewdata("$tab","studentid","$stid");
    //var_dump($stresult);
    if(!is_object($stresult)){
	die("No users found");
    }
    $st=$stresult->fetch_assoc();
    //var_dump($st["name"]); 
    $number = $row["amount"];
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $inword= $result . "Rupees  Only." ;
//exit();
$output = '';

$output .= '
   <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
     <td colspan="2" align="center" style="font-size:18px"><b>Payment Receipt</b></td>
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
         To,<br />
         <b>'.$st["name"].'</b><br />
         Student ID : '.$st["studentid"].'<br /> 
         Class : '.$st["class"].'<br />
         Course : '.$st["course"].'<br />
        </td>
        <td width="40%">
         Transaction ID : '.$row["txnid"].'<br />
         Transaction Date : '.$row["date"].'<br />
        </td>
       </tr>
      </table>
      <br/>
      <table width="100%" border="1" cellpadding="5" cellspacing="0">
       <tr>
        <th>Sr No.</th>
        <th>Txn ID</th>
        <th>Payment Type</th>
        <th>Payment Mode</th>
        <th>Amount</th>
        <th>Total Fees</th>
        <th>Payment Due</th>
       </tr>
       <tr>
       <td>1</td>
       <td>'.$row["txnid"].'</td>
       <td>'.$row["type"].'</td>
       <td>'.$row["mode"].'</td>
       <td>'.$row["amount"].'</td>
       <td>'.$st["totalfees"].'</td>
       <td>'.$st["feesdue"].'</td>
       </tr>
	   </table>
  	   <table width="100%" border="1" cellpadding="5" cellspacing="0">
       <tr>
       <td colspan="2" align="right" style="font-size:18px"><b>Total : '.$row["amount"].'</b></td>
	   </tr>
	   <tr>
       <td colspan="2" style="font-size:18px"><b>Amount in Words : '.$inword.'</b></td>
	   </tr>
       </table>		
     </td>
    </tr>
   </table>
  ';
$pdf = new Pdf();
 $file_name = 'Invoice-'.$row["txnid"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));

?>
 