<?php
require('connection.php');

#=====================login page start=================
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name  = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name) ){  
  ?>
<!-- #=====================login page end================= -->
<?php
# ===========convert id to name===========================
$sql3 = "SELECT * FROM product";
$query3 = $conn->query($sql3);

$data_list = array();

while ($data3 = mysqli_fetch_assoc($query3)){ 
    $product_id   = $data3['product_id'];
    $product_name = $data3['product_name'];
   
    $data_list[$product_id ] = $product_name;
}

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
   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
          <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Report Product</h6>
                </div>
<!-- ==========================start============================ -->
<!-- ==========================form start============================ -->
            <div class="card-body">
                  <form>
                    <div class="form-group">
                    <label for="select2Single">Product Name</label>
                    <select class="select2-single form-control" name="product_name" id="select2Single">
                    <?php
                        $sql =  "SELECT* FROM product" ;
                        $query = $conn->query($sql);

                        while ($data = mysqli_fetch_assoc($query)) {
                            $product_id       = $data['product_id'];
                            $product_name     = $data['product_name'];
                    ?>

                    <option value="<?php echo $product_id;  ?>"><?php echo $product_name;  ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                </div>
<!-- ==========================from end============================ -->
<!--=======================Show report store data start===================================== -->
<div class="row">
<!-- Latest Store Product -->
 <div class="col-xl-6 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Store Product</h6>
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
                      if(isset($_GET['product_name'])){
                        $product_name =  $_GET['product_name'];
                    
                        $sql1 = "SELECT * FROM store_product
                                WHERE store_product_name = $product_name ";
                    
                        $query1 = $conn->query($sql1);
            
                        while ( $data1 = mysqli_fetch_array($query1)){
                        $store_product_quientity = $data1['store_product_quientity'];
                        $store_product_name      = $data1['store_product_name'];
                        $store_product_entrydate = $data1['store_product_entrydate'];
                          $sl++;
                          

                      ?>
                      <tr>
                        <td><?php echo $sl;  ?></td>
                        <td><?php echo  $data_list[$store_product_name] ; ?></td>
                        <td><?php echo  $store_product_quientity; ?></td>
                        <td><?php echo  $store_product_entrydate ; ?></td>
                      
                      </tr>
                     <?php } }?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
<!--=======================Show report store data end===================================== -->
<!--=======================Show report Spend data start===================================== -->
<div class="col-xl-6 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> Spend Product</h6>
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
                      if(isset($_GET['product_name'])){
                        $product_name =  $_GET['product_name'];
                    
                        $sql4 = "SELECT * FROM spend_product
                                WHERE spend_product_name = $product_name ";
                    
                        $query4 = $conn->query($sql4);
                    
                        while ( $data4 = mysqli_fetch_array($query4)){
                        $spend_product_quientity = $data4['spend_product_quientity'];
                        $spend_product_name      = $data4['spend_product_name'];
                        $spend_product_entrydate = $data4['spend_product_entrydate'];
                          $sl++;
                          

                      ?>
                      <tr>
                        <td><?php echo $sl;  ?></td>
                        <td><?php echo  $data_list[$spend_product_name] ; ?></td>
                        <td><?php echo  $spend_product_quientity; ?></td>
                        <td><?php echo  $spend_product_entrydate ; ?></td>
                      
                      </tr>
                     <?php } }?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
<!--=======================Show report Spend data end===================================== -->
</div>
<!-- ===========================end=========================== -->
            
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
  
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>
<?php
 }else{
    header('location: login.php');
}
?>
 