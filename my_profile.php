<?php 
$page='profile';
include('connection/db.php');
include('include/header.php');
include('include/heading.php');
$query=mysqli_query($conn,"select * from profiles where user_email='{$_SESSION['email']}'");
while ($row=mysqli_fetch_array($query)) {
  $img=$row['img'];
  $name=$row['name'];
  $dob=$row['dob'];
  $number=$row['number'];
  $email=$row['email'];

}

 ?>

    <section class="ftco-section bg-light">
      <div class="container" style="width:60%; border: 1px solid gray; padding:10px;">
          <form action="include\profile_add.php" method="POST" enctype="multipart/form-data" name="profile_form" id="profile_form" >
              <div class="row">
                  <div class="col-md-4">
                      <img src="profile_img/<?php if(!empty($img)){ echo $img; }else{ echo 'profile.jpg'; } ?>" class="img-thumbnail" alt="Cinque Terre" width="200" height="200" >
                  </div>
                  <div class="col-md-6">
                      <input type="file" name="img" id="img" class="form-control">
                  </div>
              </div>
              <div style="margin-left:30%;" >
              <div class="row">
                  <div class="col-md-6">
                      <td> Enter Your Name : </td>
                  </div>
                  <div class="col-md-6">
                      <td><input type="text" name="name" id="name" value="<?php if(!empty($name)) echo $name; ?>" placeholder="Enter your Name ..." class="form-group"> </td>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <td> Enter Your DOB : </td>
                  </div>
                  <div class="col-md-6">
                      <td><input type="date" name="dob" id="dob" value="<?php if(!empty($dob)) echo $dob; ?>" placeholder="Enter your DOB ..." class="form-group"> </td>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <td> Enter Your Mobile Number : </td>
                  </div>
                  <div class="col-md-6">
                      <td><input type="number" name="number" id="number" value="<?php if(!empty($number)) echo $number; ?>" placeholder="Enter your Mobile Number ..." class="form-group"> </td>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <td> Enter Your Email : </td>
                  </div>
                  <div class="col-md-6">
                      <td><input type="email" name="email" id="email" value="<?php if(!empty($email)) echo $email; ?>" placeholder="Enter your Email ..." class="form-group"> </td>
                  </div>
              </div>
              <div class="form-group">
                  <input type="submit" id="submit" name="submit" value="Update" class="btn btn-success">
              </div>
              </div>
          </form>
      </div>
    </section>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php 
include('include/footer.php');
?>
<!-- <script>
    $(document).ready(function(){
        $("#submit").click(function(){
          var data = $("#profile_form").serialize();
          
          $.ajax({
            type:"POST",
            url:"include/profile_add.php",
            data:data,
            success:function(data) {
              $("#msg").html(data);
            }
          });
        })
    })
</script> -->