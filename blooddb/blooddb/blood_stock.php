<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
#myProgress {
  width: 30%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #ed0915;
  color:white;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <?php 
  $active ='stock';
  include('head.php') ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">

  <div class="row">
      <div class="col-lg-6">
          <h1 class="mt-4 mb-3">Blood In Stock</h1>

        </div>
  </div>
  <form name="blood_stock" action="" method="post">
  <div class="row">
  <div class="col-lg-4 mb-4">
  <div class="font-italic">Blood Group<span style="color:red">*</span></div>
  <div><select name="bloodid" class="form-control" required>
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
    </div>
<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="search" class="btn btn-primary" value="Search" style="cursor:pointer"></div>
</div>

</div><div class="row">
<?php 
if(isset($_POST['search'])){
  $bloodid=$_POST['bloodid'];
  $sql= "SELECT * FROM `blood` WHERE `blood_id`=$bloodid";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    $row1=mysqli_fetch_assoc($result);
    $Totalunits=$row1['Total_units'];
    $bloodgrp=$row1['blood_group'];
    if($Totalunits>0)
    {
      echo  '<div id="myProgress">
    <div id="myBar"></div>
  </div>
  

  <script>
  var i = 0;
    if (i == 0) {
      i = 1;
      var elem = document.getElementById("myBar");
      var width = 1;
      var id = setInterval(frame, 5);
      function frame() {
        if (width >= 100) {
          clearInterval(id);
          i = 0;
        } else {
          width++;
          elem.style.width = width + "%";
        }
        document.getElementById("myBar").innerHTML = "Blood group : '.$bloodgrp.' Units available: '.$Totalunits.' ";

      }
  }
  </script>';
  }
  else
  {
    echo  '<h5 style="background-color:#800002; color:white;">Blood group : '.$bloodgrp.' not available</h5>';
  }
}

}
?>
<!-- <script>alert("Blood group : '.$bloodgrp.'\nUnits available:'.$Totalunits.' ");</script> -->
</div>
</div>
</div>

</div>
</body>

</html>
