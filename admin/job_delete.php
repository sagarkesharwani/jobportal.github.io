<?php 
include('connection/db.php');
$del=$_GET['del'];


$query=mysqli_query($conn,"delete from all_jobs where job_id = '$del'");
if($query){
    echo "<script>alert('Record has been successfully Deleted !!!!')</script>";
    header("location:create_job.php");
}else{
    echo "<script>alert('Some error for deletion process')</script>";
}



?>