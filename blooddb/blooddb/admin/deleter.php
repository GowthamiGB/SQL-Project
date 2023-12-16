<?php
include 'conn.php';
  $doctor_id = $_GET['id'];
$sql= "DELETE FROM doctor where doctor_id={$doctor_id}";
$result=mysqli_query($conn,$sql);

header("Location: doctor_list.php");

mysqli_close($conn);

 ?>
