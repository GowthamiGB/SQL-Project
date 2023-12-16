<?php
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$gender=$_POST['gender'];
$btype=$_POST['blood'];
$units=$_POST['units'];
$conn=mysqli_connect("localhost","root","","blood") or die("Connection error");

$sql= "INSERT INTO patient(PName,PPhone,PGender,PBlood_type,P_units) values('{$name}','{$number}','{$gender}','{$btype}','{$units}')";
$result=mysqli_query($conn,$sql) or die("query successful.");
if($result){
    echo  'patient Registration Sucessfull';
      }
     else
     {
      echo 'patient registration not sucessful';
      }
        

mysqli_close($conn);
 ?>