<?php
include('include/header.php');
include('include/sidebar.php');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              </div>
            </div>
          </div>
          <?php 
$query=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}'and admin_type='1'");
if (mysqli_num_rows($query)>0) {

$query = "SELECT * FROM admin_login WHERE admin_type = 2 ";
$company_employee = mysqli_query($conn,$query);
$company_employee_count = mysqli_num_rows($company_employee);
                                    

                                     
$query = "SELECT * FROM all_jobs ";
$all_job = mysqli_query($conn,$query);
$all_job_count = mysqli_num_rows($all_job);


$query = "SELECT * FROM jobskeer ";
$jobseekers = mysqli_query($conn,$query);
$seekers_count = mysqli_num_rows($jobseekers);


$query = "SELECT * FROM job_apply";
$job_apply = mysqli_query($conn,$query);
$job_apply_count = mysqli_num_rows($job_apply);


   ?>
             <div class="row" style="margin-left: 200px;">
               
             <script type="text/javascript">
     google.load("visualization", "1.1", {packages:["bar"]});
     google.setOnLoadCallback(drawChart);
     function drawChart() {
       var data = google.visualization.arrayToDataTable([
         ['Data', 'Count'],
           
           <?php
                                     
   $element_text = ['Company Employee','All Jobs','Total Seekers', 'Job Applied'];       
   $element_count = [$company_employee_count,$all_job_count, $seekers_count, $job_apply_count];


   for($i =0;$i < 4; $i++) {
   
       echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
    
   
   
   }
                 
               
}else{                                   

                                     
$query = "select * from all_jobs where customer_email='{$_SESSION['email']}' ";
$all_job = mysqli_query($conn,$query);
$all_job_count = mysqli_num_rows($all_job);

$query1 = "select * from job_apply LEFT JOIN all_jobs ON job_apply.id_job = all_jobs.job_id where customer_email='{$_SESSION['email']}'";
$job_apply = mysqli_query($conn,$query1);
$job_apply_count = mysqli_num_rows($job_apply);


   ?>
             <div class="row" style="margin-left: 300px;" >

               
               <script type="text/javascript">
     google.load("visualization", "1.1", {packages:["bar"]});
     google.setOnLoadCallback(drawChart);
     function drawChart() {
       var data = google.visualization.arrayToDataTable([
         ['Data', 'Count'],
           
           <?php
                                     
   $element_text = ['All Jobs','Job Applied'];       
   $element_count = [$all_job_count, $job_apply_count];


   for($i =0;$i < 2; $i++) {
   
       echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
    
   
   
   }
                                                           
     }   ?>    
              
    
       ]);

       var options = {
         chart: {
           title: '',
           subtitle: '',
         }
       };

       var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

       chart.draw(data, options);
     }
   </script>
                  
                  
 <div id="columnchart_material" style="width:700px; height: 490px;"></div>
                   
    </div>     
      
          <!-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas> -->

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
