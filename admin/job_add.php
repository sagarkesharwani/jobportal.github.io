<?php
session_start();
include('connection/db.php');

$login=$_SESSION['email'];
$id=$_POST['id'];
$job_title=$_POST['job_title'];
$des=$_POST['des'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$category=$_POST['category'];
$keyword=$_POST['keyword'];

if(!$id){
$query= mysqli_query($conn,"insert into all_jobs(customer_email,job_title,des,country,state,city,category,keyword)values('$login','$job_title','$des','$country','$state','$city','$category','$keyword')");

 if($query){
     echo "<div class='alert alert-success'>Data has been Successfully Inserted</div>";
 }else {
    echo "<div class='alert alert-danger'>Somer  error please try again</div>";
 }
}else {
    $query=mysqli_query($conn,"update all_jobs set job_title='$job_title',des='$des',country='$country',state='$state',city='$city',category='$category',keyword='$keyword' where job_id='$id' ");
    if($query){
        echo "<script>alert('Record has been Update successfully !!!!')</script>";
        header("location:create_job.php");
    }else {
       echo "<div class='alert alert-danger'>Somer  error please try again</div>";
    }
}

?>