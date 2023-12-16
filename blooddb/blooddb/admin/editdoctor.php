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
</style>
</head>

<body style="color:black">

  <?php
  include 'conn.php';
    include 'session.php';
    $sql= "select * from doctor";
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php 
$active="doctor";
 include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Update Doctor Info</h1>
        </div>
      </div>
      <hr>
      <?php
       $conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
       $doctor_id=$_GET['id'];
      $query="SELECT * FROM `doctor` where `doctor_id`=$doctor_id";
      $res1=mysqli_query($conn,$query);
      $row1=mysqli_fetch_assoc($res1);
      
        $name=$row1['doctor_name'];
        $number=$row1['doctor_phone'];
         if(isset($_POST['update']))

      {  
          $doctor_id=$_GET['id'];
           $address=$_POST['fullname'];
           $number=$_POST['mobileno'];
        
       
        $sql= "UPDATE doctor SET doctor_name='{$address}',doctor_phone='{$number}'where doctor_id='{$doctor_id}'";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
      echo '<div class="alert alert-success"><b>Doctor Details Updated Successfully.</b></div>';

        mysqli_close($conn);
      }
      ?>


      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">Doctor Details</div>
            <div class="panel-body">
              <form method="post"  name="editdoctor" class="form-horizontal">

      <div class="form-group">
                  <label class="col-sm-4 control-label"> Name</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="fullname" id="fullname" required></textarea>
                  </div>
                </div>
                
      <div class="form-group">
                  <label class="col-sm-4 control-label"> Contact Number </label>
                  <div class="col-sm-8">
                    <input pattern="[6-9]\d\d\d\d\d\d\d\d\d"type="text" class="form-control" value="" name="mobileno" id="mobileno" required>
                  </div>
                </div>

                <div class="hr-dashed"></div>




                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">

                    <button class="btn btn-primary" name="update" type="submit">Update</button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>


        </div>
      </div>
    </div>
  <?php
 } else {
     echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
     ?>
     <form method="post" name="" action="login.php" class="form-horizontal">
       <div class="form-group">
         <div class="col-sm-8 col-sm-offset-4" style="float:left">

           <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
         </div>
       </div>
     </form>
 <?php }
  ?>

</body>
</html>
