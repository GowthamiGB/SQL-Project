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
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php 
$active="donate";
 include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Update Donor Info</h1>
        </div>
      </div>
      <hr>
      <?php 
      $donor_id=$_GET['id'];
      $query="SELECT * FROM `donor_details` where `donor_id`=$donor_id";
      $res1=mysqli_query($conn,$query);
      $row1=mysqli_fetch_assoc($res1);
      $name=$row1['donor_name'];
        $number=$row1['donor_number'];
        $email=$row1['donor_mail'];
        $DOB=$row1['donor_DOB'];
        $gender=$row1['donor_gender'];
        $weight=$row1['donor_weight'];
        $doctor=$row1['donor_doctor'];
      $date=$row1['donor_date'];
      if(isset($_POST['update']))
      {   $conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
         $donor_id=$_GET['id'];
        $name=$_POST['fullname'];
        $number=$_POST['mobileno'];
        $email=$_POST['emailid'];
        $DOB=$_POST['DOB'];
       
        $weight=$_POST['weight'];
        $doctor=$_POST['doctor'];
        $date=$_POST['Examination'];
        
        $sql= "update donor_details set donor_name='{$name}', donor_number='{$number}', donor_mail='{$email}',donor_DOB='{$DOB}',donor_weight='{$weight}',donor_doctor='{$doctor}' where donor_id=' {$donor_id}'";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
      echo '<div class="alert alert-success"><b>Donor Details Updated Successfully.</b></div>';

        mysqli_close($conn);
      }
      ?>


      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">Donor details</div>
            <div class="panel-body">
              <form method="post"  name="editdonor" class="form-horizontal">

      <div class="form-group">
                  <label class="col-sm-4 control-label"> Name </label>
                  <div class="col-sm-8">
                    <input class="form-control" name="fullname" id="fullname" value="<?php echo "$name"; ?>"></input>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Mobile Number</label>
                  <div class="col-sm-8">
                    <input pattern="[6-9]\d\d\d\d\d\d\d\d\d"type="text" class="form-control" name="mobileno" id="mobileno" value="<?php echo "$number"; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Email Id </label>
                  <div class="col-sm-8">
                    <input  pattern=^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$ type="email" class="form-control" name="emailid" id="emailid" value="<?php echo "$email"; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> DOB </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="DOB" id="DOB" value="<?php echo "$DOB"; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"> Weight </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="weight" id="weight" value="<?php echo "$weight"; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Doctor-Name</label>
                  <div class="col-sm-8">
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
                     </div>




                <div class="form-group">
                  <label class="col-sm-4 control-label"> Date of Examination</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="Examination" id="Examination" value="<?php echo "$date"; ?>">
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
