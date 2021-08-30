<?php

 $connect = mysqli_connect("localhost", "root", "", "sms");
 $output = '';
 $query = "SELECT * FROM subject WHERE class = '".$_POST["classname"]."' ";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select Subject</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["subjectname"].'">'.$row["subjectname"].'</option>';
  }
  echo $output;
 ?>