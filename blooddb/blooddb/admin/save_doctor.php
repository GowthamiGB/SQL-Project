<?php
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
$sql= "INSERT INTO doctor(doctor_name,doctor_phone) values('{$name}','{$number}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");


mysqli_close($conn);
 ?>
