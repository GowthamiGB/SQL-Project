<?php
$name=$_POST['name'];
$doctor=$_POST['doctor'];
$date=$_POST['Examination'];

$conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
$sql= "INSERT INTO date_of_examination(donor_name,doc_name,dateexamined) values('{$name}','{$doctor}','{$date}')";
$result=mysqli_query($conn,$sql) or die("query successful.");
if($result){
    echo  'Donor Registration Sucessfull';
      }
     else
     {
      echo 'Donor registration not sucessful';
      }
        

mysqli_close($conn);
 ?>