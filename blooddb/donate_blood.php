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
<script src="jquery-3.5.1.min.js"></script>
</head>
<?php

$conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
if(isset($_POST['submit'])){
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$DOB=$_POST['DOB'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$weight=$_POST['weight'];
$doctor=$_POST['doctor'];
$units=$_POST['units'];

$query0="SELECT * FROM `blood` WHERE `blood_id`=$blood_group";
$res0=mysqli_query($conn,$query0);
$row0=mysqli_fetch_assoc($res0);
$blood_groupname=$row0['blood_group'];

$sql= "INSERT INTO `donor_details`(`donor_name`, `donor_number`, `donor_mail`, `donor_DOB`, `donor_gender`, `blood_group`, `donor_weight`, `donor_doctor`, `donor_date`) VALUES ('$name','$number','$email','$DOB','$gender','$blood_groupname','$weight','$doctor',CURDATE())";
$result=mysqli_query($conn,$sql) or die("query unsuccessful");
if($result){
  $sql2="SELECT * FROM `blood` where `blood_id`=$blood_group";
  $res1=mysqli_query($conn,$sql2);
  $row1=mysqli_fetch_array($res1);
  $Totalunit=$row1['Total_units'];
  $Totalunit=$Totalunit+$units;
          $query="UPDATE `blood` SET `Total_units`= $Totalunit WHERE `blood_id`='$blood_group'";
          $res2=mysqli_query($conn,$query);
          if($res2){
          echo  '<script>alert("Donor Registration Successful");</script>';
            }
           else
           {
            echo '<script>alert("Donor registration not successful");</script>';
            }
mysqli_close($conn);
          }
          else{
            echo '<script>alert("Failed to register");</script>';
          }
        }
 ?>
<body>
<?php
$active ='donate';
 include('head.php') ?>

<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
  <div id="content-wrap" style="padding-bottom:50px;">
<div class="row">
    <div class="col-lg-6">
        <h1 class="mt-4 mb-3">Donate Blood </h1>
      </div>
</div>
<!-- action="savedata.php" -->
<form name="donor_details"  method="post">
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
<div class="font-italic">Email Id</div>
<div><input pattern=^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$ type="email" name="emailid" class="form-control"></div>
</div>
</div>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">DOB<span style="color:red">*</span></div>
<div><input type="date" name="DOB" max="<?php echo date('Y-m-d', strtotime('18 years ago')); ?>" class="form-control" id="datepicker" required></div>
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
<div class="font-italic">Weight<span style="color:red">*</span></div>
<div><input type="text" name="weight" class="form-control"  pattern="[4][5-9]|[5-9][0-9]" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Doctor-Name<span style="color:red">*</span></div>
<div><select name="doctor" class="form-control" required>
  <option value=""selected disabled>Select</option>
  <?php
    include 'conn.php';
    $sql= "select * from doctor";
    $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
    while($row=mysqli_fetch_assoc($result)){
   ?>
   <option value=" <?php echo $row['doctor_id'] ?>"> <?php echo $row['doctor_name'] ?> </option>
  <?php } ?>
</select>
</div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">No. of Units<span style="color:red">*</span></div>
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
