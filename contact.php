<?php 
$page='contact';
include('include/header.php');
include('include/heading.php');
 ?>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> Sarojini Naidu Rd, near Court, Ashok Nagar, Mulund West, Mumbai, Maharashtra 400080</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel:022 2564 0718">022 2564 0718</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:mccmulund@gmail.com">mccmulund@gmail.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

         
        </div>
      </div>
    </section>
		


    <?php 
include('include/footer.php');
?>