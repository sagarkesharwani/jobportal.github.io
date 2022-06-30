<?php
include('connection/db.php');

$id=$_POST['id'];
$email=$_POST['email'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$admin_type=$_POST['admin_type'];

if(!$id){
$query= mysqli_query($conn,"insert into admin_login(admin_email,admin_pass,admin_username,first_name,last_name,admin_type)values('$email','$pass','$username','$firstname','$lastname','$admin_type')");
var_dump($query);
 if($query){
     echo "<div class='alert alert-success'>Data has been Successfully Inserted</div>";
 }else {
    echo "<div class='alert alert-danger'>Somer  error please try again</div>";
 }
}else {
    $query1=mysqli_query($conn,"update admin_login set admin_email='$email',admin_pass='$pass',admin_username='$username',first_name='$firstname',last_name='$lastname',admin_type='$admin_type' where id='$id' ");
    if($query1){
        echo "<script>alert('Record has been Update successfully !!!!')</script>";
        header("location:customers.php");
    }else {
       echo "<div class='alert alert-danger'>Somer  error please try again</div>";
    }
}

?>