<?php
require('connection.php');

#=====================login page start=================
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name  = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name) ){  
?>
 <!-- #=====================login page end================= -->

<!-- #=====================Total Category================= -->
<?php
       $sql1 =  "SELECT* FROM category" ;
       $query1 = $conn->query($sql1);

      $total_category =  mysqli_num_rows($query1);
?>
<!-- #=====================Total Product================= -->
<?php
      $sql2 =  "SELECT* FROM product" ;
      $query2 = $conn->query($sql2);
      $total_product =  mysqli_num_rows($query2);
?>
<!-- #=====================Total Store Product================= -->
<?php
 $sql3 =  "SELECT* FROM store_product" ;
 $query3 = $conn->query($sql3);

 $total_store_product =  mysqli_num_rows($query3);
?>
<!-- #=====================Total Spent Product================= -->
<?php
   $sql4 =  "SELECT* FROM spend_product";
   $query4 = $conn->query($sql4);

   $total_spend_product =  mysqli_num_rows($query4);
?>
<!-- ===============Latest Store Product show ======================-->

<?php
$sql_store = "SELECT * FROM product";
$query_store = $conn->query($sql_store);

$data_list = array();

while ($data_store = mysqli_fetch_assoc($query_store)){ 
    $product_id   = $data_store['product_id'];
    $product_name = $data_store['product_name'];
   
    $data_list[$product_id ] = $product_name;
}

$sql_store =  "SELECT* FROM store_product ORDER BY store_product_id  DESC  LIMIT 10" ;
$query_store = $conn->query($sql_store);

?>
<!-- ===============Latest Spend Product show ======================-->
<?php
$sql_spend = "SELECT * FROM product";
$query_spend = $conn->query($sql_spend);

$data_list = array();

while ($data_spend = mysqli_fetch_assoc($query_spend)){ 
    $product_id   = $data_spend['product_id'];
    $product_name = $data_spend['product_name'];
   
    $data_list[$product_id ] = $product_name;
}

$sql_spend =  "SELECT* FROM spend_product ORDER BY spend_product_id  DESC  LIMIT 10" ;
$query_spend = $conn->query($sql_spend);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
   <?php
        include('sidebar.php');
   ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include('topbar.php');?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Category</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_category; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-fw fa-window-maximize fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Product</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  $total_product;?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-table fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Store Product</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php  echo  $total_store_product ; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-window-restore fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Spend Product</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo  $total_spend_product; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-window-restore fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
            <!-- Latest Store Product -->
            <div class="col-xl-6 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Latest Store Product</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quientity</th>
                        <th>Date</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sl = 0;
                         while ($data = mysqli_fetch_assoc($query_store)) {
                          $store_product_id         = $data['store_product_id'];
                          $store_product_name       = $data['store_product_name'];
                          $store_product_quientity  = $data['store_product_quientity'];
                          $store_product_entrydate  = $data['store_product_entrydate'];
                          $sl++;
                          

                      ?>
                      <tr>
                        <td><?php echo $sl;  ?></td>
                        <td><?php echo  $data_list[$store_product_name] ; ?></td>
                        <td><?php echo  $store_product_quientity; ?></td>
                        <td><?php echo  $store_product_entrydate ; ?></td>
                      
                      </tr>
                     <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
            <!--Latest Spend Product -->
            <div class="col-xl-6 col-lg-5 ">
                 <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Latest Spend Product</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                      <th>ID</th>
                        <th>Product Name</th>
                        <th>Quientity</th>
                        <th>Date</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sl=0;
                           while ($data = mysqli_fetch_assoc($query_spend)) {
                            $spend_product_id         = $data['spend_product_id'];
                            $spend_product_name       = $data['spend_product_name'];
                            $spend_product_quientity  = $data['spend_product_quientity'];
                            $spend_product_entrydate  = $data['spend_product_entrydate'];
                            $sl++;
                      ?>
                       <tr>
                        <td><?php echo $sl;  ?></td>
                        <td><?php echo  $data_list[$spend_product_name] ; ?></td>
                        <td><?php echo  $spend_product_quientity; ?></td>
                        <td><?php echo  $spend_product_entrydate ; ?></td>
                      
                      </tr>
                     <?php } ?>
                     
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Puja</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  
</body>

</html>
<?php
 }else{
    header('location: login.php');
}
?>