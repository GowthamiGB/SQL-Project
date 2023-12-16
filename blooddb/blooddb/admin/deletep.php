<?php
include 'conn.php';
  $patient_id = $_GET['id'];
$sql= "DELETE FROM patient where patient_id={$patient_id}";
$result=mysqli_query($conn,$sql);

header("Location: patient_list.php");

mysqli_close($conn);

 ?>