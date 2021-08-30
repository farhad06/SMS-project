<!DOCTYPE html>
<html>
<head>
  <title></title>
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
  OR course LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM student ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <thead>
    <tr>
     <th>Employment ID</th>
     <th>Name</th>
     <th>Email</th>
     <th>Mobile No</th>
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
    <td>
    <a href="studentprofile.php?empid='.$row["id"].'">Profile</a>
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

</body>
</html>