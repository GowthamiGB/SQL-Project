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

          <h1 class="page-title">Doctor List</h1>

        </div>

      </div>
      <hr>
      <?php
        include 'conn.php';

        $limit = 10;
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $count=$offset+1;
        $sql= "select * from doctor  LIMIT {$offset},{$limit}";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)   {
       ?>

       <div class="table-responsive">
      <table class="table table-bordered" style="text-align:center">
          <thead style="text-align:center">
          <th style="text-align:center">S.no</th>
          <th style="text-align:center">Name</th>
          <th style="text-align:center">Mobile Number</th>
          
          <th style="text-align:center">Action</th>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['doctor_name']; ?></td>
                  <td><?php echo $row['doctor_phone']; ?></td>
                 
                    <td id="he" style="width:100px">
                    <a style="background-color:aqua" href='editdoctor.php?id=<?php echo $row['doctor_id']; ?>'> Edit </a>
                    <a style="background-color:aqua" href='deleter.php?id=<?php echo $row['doctor_id']; ?>'> Delete </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
    <?php } ?>


       <form method="post" name="" action="add_doctor.php" class="form-horizontal">
         <div class="form-group">
           <div class="col-sm-8 col-sm-offset-4" style="float:left">

             <button class="btn btn-primary" name="" type="submit">Add Doctor</button>
           </div>
         </div>
       </form>
   <?php }

    ?>
</body>
</html>
