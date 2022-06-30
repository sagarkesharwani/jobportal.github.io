<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');

$edit=$_GET['edit'];
$query=mysqli_query($conn,"select * from company where company_id='$edit'");
while ($row=mysqli_fetch_array($query)) {
    $company=$row['company'];
    $description=$row['des'];
    $admin=$row['admin'];
}

?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
    <li class="breadcrumb-item"><a href="#">Update Comapny</a></li>
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Update Company</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">

              </div>
            </div>
          </div>

          <div style="width:50%; margin-left: 25%; background-color: #E5E8E8;">
          <div id="msg"></div>
          <form action="" method="post" style="margin:3%; padding:3%;" name="company_form" id="company_form">
                  <div class="form-group">
                      <label for="Company Name">Company Name</label>
                      <input type="text" class="form-control" name="company" id="company" value="<?php echo $company; ?>" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group">
                      <label for="Company Description">Enter Company Description</label>
                      <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?php echo $description; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label for="Company Admin">Select Company Admin</label>
                      <select name="admin" id="admin" class="form-control" value="<?php echo $admin; ?>" >
                          <?php 
                          $sql=mysqli_query($conn,"select * from admin_login where admin_type='2'");
                                                    
                          while ($row=mysqli_fetch_array($sql)) { ?>
                          <option value="<?php echo $row['admin_email']; ?>"><?php echo $row['admin_email']; ?></option>
                          <?php } ?>
                      </select>
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>" >
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
          var id  =$('#id').val();
          var company  =$('#company').val();
          var description  =$('#description').val();

          var data = $("#company_form").serialize();
          
          $.ajax({
            type:"POST",
            url:"company_add.php",
            data:data,
            success:function(data) {
              $("#msg").html(data);
            }
          });
        });
      });
    </script>
  </body>
</html>
