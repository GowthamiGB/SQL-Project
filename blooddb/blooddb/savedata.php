<?php
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$DOB=$_POST['DOB'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$weight=$_POST['weight'];
$doctor=$_POST['doctor'];

$conn=mysqli_connect("localhost","root","","blood") or die("Connection error");
$sql= "INSERT INTO donor_details(donor_name,donor_number,donor_mail,donor_DOB,donor_gender,donor_blood,donor_weight,donor_doctor) values('{$name}','{$number}','{$email}','{$DOB}','{$gender}','{$blood_group}','{$weight}','{$doctor}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
if($result){
          echo  '<div class="alert alert-danger">Donor Registration Sucessfull</div>';
            }
           else
           {
            echo 'Donor registration not sucessful';
            }
                  

mysqli_close($conn);
 ?>
