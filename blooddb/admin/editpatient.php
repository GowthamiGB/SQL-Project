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
$active="patient";
 include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Update Patient Info</h1>
        </div>
      </div>
      <hr>
      <?php 
      $conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
      $patient_id=$_GET['id'];
      $query="SELECT * FROM `patient` where `patient_id`=$patient_id";
      $res1=mysqli_query($conn,$query);
      $row1=mysqli_fetch_assoc($res1);
      
        $name=$row1['PName'];
        $number=$row1['PPhone'];
        $blood=$row1['PBlood_group'];
        $gender=$row1['PGender'];
        $units=$row1['P_units'];

      if(isset($_POST['update']))
      {   
        
        $patient_id=$_GET['id'];
        $name=$_POST['fullname'];
        $number=$_POST['mobileno'];
        $blood=$_POST['blood'];
        $gender=$_POST['gender'];
        $units=$_POST['units'];

        $sql= "UPDATE `patient` SET `PName`='$name',`PPhone`='$number',`PGender`='$gender',`PBlood_group`='$blood',`P_units`='$units' WHERE `patient_id`=$patient_id";
        $result=mysqli_query($conn,$sql);
        if($result){
      //echo '<div class="alert alert-success"><b>Patient Details Updated Successfully.</b></div>';
        
      echo "<script>window.location.href='patient_list.php'</script>";
        mysqli_close($conn);
      }
    }
      ?>


      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">Update Patient details</div>
            <div class="panel-body">
              <form method="post"  name="editpatient" class="form-horizontal">

      <div class="form-group">
                  <label class="col-sm-4 control-label"> Name </label>
                  <div class="col-sm-8">
                    <input class="form-control" name="fullname" id="fullname" value="<?php echo $name; ?>"></input>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"> Mobile Number</label>
                  <div class="col-sm-8">
                    <input pattern="[6-9]\d\d\d\d\d\d\d\d\d"type="text" class="form-control" name="mobileno" id="mobileno" value="<?php echo $number; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Blood Group</label>
                  <div class="col-sm-8">
                  <div><select name="blood" class="form-control" >
                  <option value="<?php echo $blood; ?>"><?php echo $blood; ?></option>
                      <?php
                     include 'conn.php';
                    $sql= "select * from blood";
                    $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
                     while($row=mysqli_fetch_assoc($result)){
                     ?> 
                           <option value=" <?php echo $row['blood_group'] ?>"> <?php echo $row['blood_group'] ?> </option>
                      <?php } ?>
                       </select>
                    </div>
                    </div>
                    </div>
                
                <div class="hr-dashed"></div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Gender</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="gender" id="mobileno" value="<?php echo $gender; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Units</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="units" id="mobileno" value="<?php echo $units; ?>">
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">

                    <button class="btn btn-primary" name="update" type="submit">Update</button>
                  </div>
                </div>

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
