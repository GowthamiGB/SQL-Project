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
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Create Schedule</h1>
        </div>
      </div>
      <hr>
      <form name="date_of_examination" action="savedata.php" method="post">
        <div class="row">
      <div class="form-group">
                  <label class="col-sm-4 control-label">Select Donor</label>
                  <div class="col-sm-8">
                  <div><select name="name" class="form-control" required>
                     <option value=""selected disabled>Select</option>
                   <?php
                include 'conn.php';
                   $sql= "select * from donor_details" ;
                     $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
                 while($row=mysqli_fetch_assoc($result)){
                        ?>
               <option value=" <?php echo $row['donor_id'] ?>"><?php echo $row['donor_name'] ?> </option>
                      <?php } ?>
                </select>
                   </div>
                  </div>
                </div><br><br>
                <div class="row">
                <label class="col-sm-4 control-label"> Select Doctor</label>
                  <div class="col-sm-8">
                   <div><select name="doctor" class="form-control" required>
                   <option value=""selected disabled>Select</option>
                       <?php
                       include 'conn.php';
                        $sql=  "select * from doctor ";
                            $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
                      while($row=mysqli_fetch_assoc($result)){
                           ?>
                <option value=" <?php echo $row['doctor_id'] ?>"><?php echo $row['doctor_name'] ?> </option>  
                       <?php } ?>
                      </select>
                      </div>
                        </div>
                      </div><br><br>
               
                      <div class="row">
                      <label class="col-sm-4 control-label"> Add Examination Date</label>
                   <div class="col-sm-8"><input type="date" name="Examination" class="form-control"></div>
                       </div>
                      </div>
                      </div>
                <div class="hr-dashed"></div>




                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">

                    <button class="btn btn-primary" name="submit" type="submit">submit</button>
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
