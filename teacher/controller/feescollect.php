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
  SELECT * FROM student 
  WHERE name LIKE '%".$search."%'
  OR email LIKE '%".$search."%'
  OR phone LIKE '%".$search."%'
  OR studentid LIKE '%".$search."%' 
  OR class LIKE '%".$search."%'
  OR feesdue LIKE '%".$search."%'
  OR course LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM student ORDER BY id DESC
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
     <th>Name</th>
     <th>Email</th>
     <th>Mobile No</th>
     <th>Payment Due</th>
     <th>Action</th>
    </tr></thead
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tbody>
   <tr>
    <td>'.$row["studentid"].'</td>
    <td>'.$row["name"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["phone"].'</td>
    <td>'.$row["feesdue"].'</td>
    <td>
    <a href="feescollect.php?empid='.$row["studentid"].'">FEES</a>
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