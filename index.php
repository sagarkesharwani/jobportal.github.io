<?php 
$page='home';
include('include/header.php'); 
?>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
          	
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Job is Waiting</span></h1>

						<div class="ftco-search">
							<div class="row">
			          <div class="col-md-12 tab-wrap">
			            
			            <div class="tab-content p-4" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
			              	<form action="index.php" method="post" class="search-job">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-briefcase"></span></div>
								                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search Jobs Title">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="category" id="category" class="form-control">
                                  <option value="">Category</option>
                                    <?php 
                                    include('connection/db.php');
                                    $query=mysqli_query($conn,"select * from job_category");
                                    while ($row=mysqli_fetch_array($query)) { ?>
                                      <option value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
                                   <?php } ?>
						                      	
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              			<!-- <div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" class="form-control" placeholder="Location">
								              </div>
							              </div>
			              			</div> -->
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" value="Search" name="search" id="search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>
			            </div>
			          </div>
			        </div>
		        </div>
          </div>
        </div>
      </div>
    </div>
<?php 
include('connection/db.php');
if(isset($_POST['search']) or ($_GET['pages'])) {

  $pages=$_GET['pages'];
  if ($pages=="") {
    $page1=0;
    $keyword=$_POST['keyword'];
    $category=$_POST['category'];
  }else {
    $keyword=$_GET['keyword'];
    $category=$_GET['category'];
    $page1=($pages*3)-3;
  }


  $query1="select * from all_jobs LEFT JOIN company ON all_jobs.customer_email=company.admin WHERE keyword LIKE '%$keyword%' OR category='$category' limit $page1,3  ";
  
  $sql=mysqli_query($conn,$query1);
  $error=mysqli_num_rows($sql);
  

}

if(isset($_POST['search']) or ($_GET['pages'])){

?>
<div id="id_all_jobs1">
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Recently Added Jobs</span>
            <h2 class="mb-4"><span>Recent</span> Jobs</h2>
            <br> <br>
            <h3>
              <?php
              if ($error=="") {
                echo "Data Not Found !! ";
              }
              ?>

            </h3>
          </div>
        </div>
				<div class="row">

      <?php

      while ($row=mysqli_fetch_array($sql)) { ?>

					<div class="col-md-12 ftco-animate">

            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3"><?php echo $row['job_title'] ;  ?></h2>
                  <div class="badge-wrap">
                   <span class="bg-primary text-white badge py-2 px-3"><?php echo $row['city'] ; ?></span>
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $row['company'] ;  ?></a></div>
                  <div><span class="icon-my_location"></span> <span><?php echo $row['country'] ; ?>,<?php echo $row['state'] ; ?>,<?php echo $row['city'] ; ?></span></div>
                </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job_apply.php?id=<?php echo $row['job_id']; ?>" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                	<span class="icon-heart"></span>
                </a>
              </div>
            </div>
          </div><!-- end -->
<?php } ?>
				</div>
				<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <?php
                $query1="select * from all_jobs LEFT JOIN company ON all_jobs.customer_email=company.admin WHERE keyword LIKE '%$keyword%' OR category='$category'";
  
                $sql=mysqli_query($conn,$query1);
                $count=mysqli_num_rows($sql);
                $a=$count/3;
                ceil($a);
                for ($b=1; $b <= $a ; $b++) {
                ?>
                <li><a href="index.php?pages=<?php echo $b;?>& keyword=<?php echo $keyword;?>& category=<?php echo $category;?>"><?php echo $b; ?></a></li>
                <?php } ?>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
			</div>
		</section>
    </div>
<?php

 }else{
  
} ?>

     
    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Millions of Jobs</h3>
                <p>The resume focuses on you and the past. The cover letter focuses on the employer and the future.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-collaboration"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                <p>This one is kind of obvious, I suppose. You don’t have to work 50, 60, or 70 hours a week to be “easy to manage.”</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-promotions"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Careers</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employee"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Expert Candidates</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Categories work wating for you</span>
            <h2 class="mb-4"><span>Current</span> Job Posts</h2>
          </div>
        </div>
        <div class="row">
          <?php 
          $try="select * from job_category ";
          $query2=mysqli_query($conn,$try);
          
          while ($row2=mysqli_fetch_array($query2)) {
            
          ?>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
            <?php
            $id_c=$row2['id'];
          $all="select * from all_jobs where category = '$id_c' ";
          $query3=mysqli_query($conn,$all);
          $cat="select count(*) from all_jobs where category = '$id_c' ";
          $query4=mysqli_query($conn,$cat);
          $row3=mysqli_fetch_array($query3);
          $row4=mysqli_fetch_array($query4);
              ?>
        			<li><a href="#"> <?php echo $row2['category']; ?> <span class="number" data-number="<?php echo $row4['count(*)'] ?>">0</span></a></li>
                <?php
                
             ?>
        		</ul>
        	</div>
          <?php } ?>
        </div>
    	</div>
    </section>


<?php  include('include/footer.php'); ?>