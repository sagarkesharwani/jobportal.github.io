<?php 
include('include/header.php');
include('include/heading.php');
if (isset($_SESSION['email'])==true) {
  
}else {
  header('location:job-post.php');
}


include('connection/db.php');
$id=$_GET['id'];



$query=mysqli_query($conn,"select *from all_jobs where job_id='$id' ");
while ($row=mysqli_fetch_array($query)) {
    $title=$row['job_title'];
    $des=$row['des'];
    $country=$row['country'];
    $state=$row['state'];
    $city=$row['city'];
    $id_job=$row['job_id'];
}


?>
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3"><td><?php echo $title; ?></td></h2>
            <h5><?php echo $country; ?>, <?php echo $state; ?>, <?php echo $city; ?></h5>
            <p><?php echo $des; ?></p>
            <form action="apply.php" method="post" id="Jobportal" enctype="multipart/form-data" style="border:1px solid gray" >
            <div style="padding: 2%;" >
            <input type="hidden" name="job_seeker" value="<?php echo $_SESSION['email']; ?>" id="job_seeker" >
            <input type="hidden" name="id_job" value="<?php echo $id_job; ?>" id="id_job" >
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Enter Your First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name...." required >
                    </div>
                    <div class="col-sm-6">
                        <label for="">Enter Your Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name...." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Enter DOB</label>
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth...." required>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Choose File</label>
                        <input type="file" name="file" id="file" class="form-control" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Enter Your Contact Number </label>
                        <input type="number" class="form-control" name="number" id="number" placeholder="Mobile Number...." required>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control" disabled value="<?php echo $_SESSION['email']; ?>" >
                    </div>
                </div>
                <br>
                

                    <input type="submit" name="submit" id="submit" placeholder="Submit" class="btn btn-primary btn-block">
            </div>



            </form>
            
            
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div>
            

        </div>
      </div>
    </section> <!-- .section -->



<?php  include('include/footer.php'); ?>