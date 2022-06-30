 <!doctype html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

   <title>Jobb Portal Sign Up</title>

   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

   <!-- Bootstrap core CSS -->
   <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/signin.css" rel="stylesheet">
 </head>

 <body class="text-center">
   <form class="form-signin" action="sign_up.php" method="post">
     <img class="mb-4" src="profile_img/JB-BLUE-1.png" alt="" width="72" height="72">
     <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
     <label for="inputEmail" class="sr-only">Email address</label>
     <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
     <label for="inputPassword" class="sr-only">Password</label>
     <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

     <label for="inputEmail" class="sr-only">First name</label>
     <input type="first_name" id="first_name" class="form-control" name="first_name" placeholder="Enter your First name" required autofocus>

     <label for="inputEmail" class="sr-only">Last name</label>
     <input type="last_name" id="last_name" class="form-control" name="last_name" placeholder="Enter your Last name" required autofocus>

     <label for="inputEmail" class="sr-only">Mobile number</label>
     <input type="number" id="mobile_number" class="form-control" name="mobile_number" placeholder="Enter your Mobile number" required autofocus>

     <label for="inputEmail" class="sr-only">Date of brith</label>
     <input type="date" id="dob" class="form-control" name="dob" placeholder="Enter your Date of brith" required autofocus>


     <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign up">
     <a href="job-post.php">Already account</a>
     <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
   </form>
 </body>

 </html>
 <?php
  include('connection/db.php');
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $mobile_number = $_POST['mobile_number'];
    $check = "insert into jobskeer(email,password,first_name,last_name,dob,mobile_number)values('$email','$password','$first_name','$last_name','$dob','$mobile_number')";
    $query = mysqli_query($conn, $check);

    if ($query) {
      echo "<script>alert('now you can login')</script>";
      header('location:job-post.php');
    } else {
      echo "<script>alert('Some Error Please Try Again')</script>";
    }
  }

  ?>