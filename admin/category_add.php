<?php
include('connection/db.php');

$id=$_POST['id'];
$category=$_POST['category'];
$description=$_POST['description'];

if(!$id){
$query= mysqli_query($conn,"insert into job_category(category,des)values('$category','$description')");

 if($query){
     echo "<div class='alert alert-success'>Data has been Successfully Inserted</div>";
 }else {
    echo "<div class='alert alert-danger'>Somer  error please try again</div>";
 }
}else {
    $query=mysqli_query($conn,"update job_category set category='$category',des='$description' where category_id='$id' ");
    if($query){
        echo "<script>alert('Record has been Update successfully !!!!')</script>";
        header("location:create_category.php");
    }else {
       echo "<div class='alert alert-danger'>Somer  error please try again</div>";
    }
}

?>