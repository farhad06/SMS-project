<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>

<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "sms");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM fees 
  WHERE studentid LIKE '%".$search."%'
  OR txnid LIKE '%".$search."%'
  OR date LIKE '%".$search."%'
  OR mode LIKE '%".$search."%' 
  OR type LIKE '%".$search."%'
  OR amount LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM fees ORDER BY id DESC
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered" id="dataTables-example">
    <thead>
    <tr>
     <th>Student ID</th>
     <th>Amount</th>
     <th>Payment Type</th>
     <th>Payment Mode</th>
     <th>Txn ID</th>
     <th>Date</th>
     <th>Action</th>
    </tr></thead
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tbody>
   <tr>
    <td>'.$row["studentid"].'</td>
    <td>'.$row["amount"].'</td>
    <td>'.$row["type"].'</td>
    <td>'.$row["mode"].'</td>
    <td>'.$row["txnid"].'</td>
    <td>'.$row["date"].'</td>
    <td>
    <a href="controller/PDF/feesreceipt.php?txnid='.$row["id"].'">PDF</a>
    </td>
    
   </tr></tbody>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>