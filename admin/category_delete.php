<?php 
include('connection/db.php');
$del=$_GET['del'];


$query=mysqli_query($conn,"delete from job_category where id = '$del'");
if($query){
    echo "<script>alert('Record has been successfully Deleted !!!!')</script>";
    header("location:category.php");
}else{
    echo "<script>alert('Some error for deletion process')</script>";
}



?>