<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php

$conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
if(isset($_POST['submit']))
{
  $name=$_POST['fullname'];
  $number=$_POST['mobileno'];
  $gender=$_POST['gender'];
  $bloodid=$_POST['blood'];
  $units=$_POST['units'];

  $query1="SELECT * FROM `blood` WHERE `blood_id`=$bloodid;";
 if($res1=mysqli_query($conn,$query1))
 {

  $row1=mysqli_fetch_assoc($res1);
  $Totalunit=$row1['Total_units'];
  $bloodgrp=$row1['blood_group'];

  if($Totalunit<$units)
  {
    if($Totalunit==0)
    {
      echo  '<script>alert("Blood group '.$bloodgrp.' is out of stock");</script>';
    }
    else{
      echo  '<script>alert("Blood group : '.$bloodgrp.'\n Available units : '.$Totalunit.'\n Less units available ");</script>';
    }
  }
  else
  {
    $sql= "INSERT INTO patient(PName,PPhone,PGender,PBlood_group,P_units) values('{$name}','{$number}','{$gender}','{$bloodgrp}','{$units}')";
    $result=mysqli_query($conn,$sql) or die("query successful.");
    if($result){
      $Totalunit=$Totalunit-$units;
      $query2="UPDATE `blood` SET `Total_units`='$Totalunit' WHERE `blood_id`=$bloodid";
      $res2=mysqli_query($conn,$query2);
      if($res2){
        echo  '<script>alert("Blood group available\nPatient details added Sucessfully");</script>';
        }
        else{
          echo  '<script>alert("Something went wrong");</script>';
        }
        }
        else
        {
          echo 'patient registration not sucessful';
        }
            

    mysqli_close($conn);
      }
  }
  else{
    echo  '<script>alert("res1 error");</script>';
  }
}
 ?>
<body>
  <?php 
  $active ='need';
  include('head.php') ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">

  <div class="row">
      <div class="col-lg-6">
          <h1 class="mt-4 mb-3">Need Blood</h1>
        </div>
  </div>
  <form name="needblood" method="post">
  <div class="row">
  <div class="col-lg-4 mb-4">
<div class="font-italic">Full Name<span style="color:red">*</span></div>
<div><input type="text" name="fullname" class="form-control" required></div>
</div>
  <div class="col-lg-4 mb-4">
<div class="font-italic">Mobile Number<span style="color:red">*</span></div>
<div><input pattern="[6-9]\d\d\d\d\d\d\d\d\d" type="text" name="mobileno" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Gender<span style="color:red">*</span></div>
<div><select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span></div>
<div><select name="blood" class="form-control" required>
<option value=""selected disabled>Select</option>
  <?php
    include 'conn.php';
    $sql= "select * from blood";
    $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
  while($row=mysqli_fetch_assoc($result)){
   ?>
   <option value=" <?php echo $row['blood_id'] ?>"> <?php echo $row['blood_group'] ?> </option>
  <?php } ?>
</select>
</div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">No of units needed<span style="color:red">*</span></div>
<div><input type="text" name="units" class="form-control" required></div>
</div>

<div class="row">
<div class="col-lg-4 mb-4"><br><br><br>
<div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer"></div>
</div>


</div>
</div>
</div>

</div>
</body>

</html>

