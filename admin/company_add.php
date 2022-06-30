<?php
include('connection/db.php');

$id=$_POST['id'];
$company=$_POST['company'];
$description=$_POST['description'];
$admin=$_POST['admin'];

if(!$id){
$query= mysqli_query($conn,"insert into company(company,des,admin)values('$company','$description','$admin')");

 if($query){
     echo "<div class='alert alert-success'>Data has been Successfully Inserted</div>";
 }else {
    echo "<div class='alert alert-danger'>Somer  error please try again</div>";
 }
}else {
    $query=mysqli_query($conn,"update company set company='$company',des='$description',admin='$admin' where company_id='$id' ");
    if($query){
        echo "<script>alert('Record has been Update successfully !!!!')</script>";
        header("location:create_company.php");
    }else {
       echo "<div class='alert alert-danger'>Somer  error please try again</div>";
    }
}

?>