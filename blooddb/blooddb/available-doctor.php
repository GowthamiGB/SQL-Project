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

<body>
<?php
$active ='available';
 include('head.php') ?>

<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
  <div id="content-wrap" style="padding-bottom:50px;">
<div class="row">
    <div class="col-lg-6">
        <h1 class="mt-4 mb-3">Doctors Available</h1>
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
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['doctor_name']; ?></td>
                  <td><?php echo $row['doctor_phone']; ?></td>
                 
              </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
    <?php  }?>
