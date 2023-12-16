<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:210px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }
}
  #he{
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      padding: 3px 7px;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      align:center
  }
</style>
</head>
<?php
include 'conn.php';
  include 'session.php';
  
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
<body style="color:black">
<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php $active="list"; include 'sidebar.php'; ?>

</div>
<div id="content" >
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Add donors</h1>

        </div>

      </div>
      <hr>
      <?php
        include 'conn.php';
        ?>
        <form name="donor_details" action="save_doctor.php" method="post">
         <div class="row">
        <div class="col-lg-4 mb-4">
       <div class="font-italic">Full Name<span style="color:red">*</span></div>
       <div><input type="text" name="fullname" class="form-control" required></div>
       </div>
      <div class="col-lg-4 mb-4">
     <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
       <div><input  pattern="[6-9]\d\d\d\d\d\d\d\d\d" type="text" name="mobileno" class="form-control" required></div>
       </div>
       <div class="row">
     <div class="col-lg-4 mb-4"><br><br><br>
     <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer"></div>
     </div>
     </div>
     </div>
     </div></form>
   <?php }

    ?>
</body>
 </html>

