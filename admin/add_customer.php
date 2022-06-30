<?php
include('include/header.php');
include('include/sidebar.php');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
    <li class="breadcrumb-item"><a href="#">Add Customer</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Customer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">

              </div>
              <!-- <a class="btn btn-primary" href="add_cutomer.php" >Add Customer</a> -->
            </div>
          </div>

          <div style="width:50%; margin-left: 25%; background-color: #E5E8E8;">
          <div id="msg"></div>
              <form action="" method="post" style="margin:3%; padding:3%;" name="customer_form" id="customer_form">
                  <div class="form-group">
                      <label for="Customer Email">Enter Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Customer Email">
                  </div>
                  <div class="form-group">
                      <label for="Customer Username">Enter Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Enter Customer Username">
                  </div>
                  <div class="form-group">
                      <label for="Password">Enter Password</label>
                      <input type="text" class="form-control" name="pass" id="pass" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                      <label for="First Name">Enter First Name</label>
                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name">
                  </div>
                  <div class="form-group">
                      <label for="Last Name">Enter Last Name</label>
                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
                  </div>
                  <div class="form-group">
                      <label for="Admin Type">Admin Type</label>
                      <select name="admin_type" class="form-control" id="admin_type">
                          <option value="1">Super Admin</option>
                          <option value="2">Customer Admin</option>
                      </select>
                  </div>
                  <div class="form-group">

                      <input type="submit" class="btn btn-block btn-success" name="submit" id="submit" placeholder="Save">
                  </div>
              </form>
          </div>



          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          
          <div class="table-responsive">
           
          </div>
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
    <!-- Datatables plugin -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
    <script>
      $(document).ready(function(){
        $("#submit").click(function(){
          var email     =$('#email').val();
          var username  =$('#username').val();
          var pass      =$('#pass').val();
          var firstname =$('#firstname').val();
          var lastname  =$('#lastname').val();
          var admin_type=$('#admin_type').val();
          var data = $("#customer_form").serialize();
          
          $.ajax({
            type:"POST",
            url:"customer_add.php",
            data:data,
            success:function(data) {
              $("#msg").html(data);
            }
          });
        });
      });
    </script>

    <!-- Graphs
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
    </script> -->
  </body>
</html>
