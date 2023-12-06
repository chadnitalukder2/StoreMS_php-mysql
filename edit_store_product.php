
<?php
require('connection.php');
require('myFunction.php');
#=====================login page start=================
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name  = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name) ){  
?>
<!-- =====================login page end================= -->
<!-- =====================add product end================= -->
<?php
        #===============Get data from category start=================================
        if(isset($_GET['id'])){
            $getid = $_GET['id'];

            $sql   = "SELECT * FROM store_product
                    WHERE store_product_id  = $getid";

            #===============show data start=================================

            $query =  $conn->query($sql);
            $data  =  mysqli_fetch_assoc( $query);
  
            $store_product_id         =  $data['store_product_id'];
            $store_product_name       =  $data['store_product_name'];
            $store_product_quientity  =  $data['store_product_quientity'];
            $store_product_entrydate  =  $data['store_product_entrydate'];
        }

        #===============Get data from input start=================================
        if(isset($_GET['store_product_name'])){
            $new_store_product_id        =  $_GET['store_product_id'];
            $new_store_product_name      =  $_GET['store_product_name'];
            $new_store_product_quientity =  $_GET['store_product_quientity'];
            $new_store_product_entrydate =  $_GET['store_product_entrydate'];

            #===============update data start================================= 
            $sql1 = "UPDATE store_product
                    SET store_product_name       ='$new_store_product_name',
                        store_product_quientity  ='$new_store_product_quientity',
                        store_product_entrydate  ='$new_store_product_entrydate'
                    WHERE store_product_id  = $new_store_product_id ";
    
            if($conn->query($sql1) == TRUE ){
                echo "Update Successful";
                header('location: List_of_store_product.php'); #data insert korar por direct list page e jabe
            }
            else{
                echo "Not Update";
            }
        }
    ?>
        $date = date('d/m/Y');
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
    <!-- Select2 -->
  <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
   <!-- Bootstrap DatePicker -->  
  <link href="vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
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
 <!-- ADD Product -->
          <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Store Product</h6>
                </div>
                <div class="card-body">
                  <form>
                  
                    <div class="form-group">
                    <label for="select2Single">Product Name</label>
                    <select class="select2-single form-control" name="store_product_name" id="select2Single">
                    <?php
                        $sql   = "SELECT * FROM product";
                        $query = $conn->query($sql);

                        while ($data  = mysqli_fetch_array($query)){
                            $product_id   =  $data['product_id'];
                            $product_name =  $data['product_name'];
                    ?>
                     <option value='<?php echo $product_id ?>' <?php if($store_product_name == $data['product_id']){echo 'selected';} ?>>
                            <?php echo $product_name ?>
                    </option>
                    <?php }?>
                    </select>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputCategory">Product Quientity</label>
                      <input type="Text" name="store_product_quientity" value='<?php echo $store_product_quientity; ?>' class="form-control" id="exampleInputCategory" aria-describedby="emailHelp"
                        placeholder="Enter Product name">
                    </div>


                    <div class="form-group" id="simple-date1">
                    <label for="simpleDataInput">Store Entry Date </label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text"name="store_product_entrydate" value='<?php echo $store_product_entrydate; ?>' class="form-control" value="<?php echo $date ;  ?>" id="simpleDataInput">
                      </div>
                  </div>
                  <input type="text" name="store_product_id" value='<?php echo $store_product_id; ?>' hidden>
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
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
  
  <!-- Select2 -->
  <script src="vendor/select2/dist/js/select2.min.js"></script>
   <!-- Bootstrap Datepicker -->
   <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   <script>
    $(document).ready(function () {


      $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
      });      

      // Select2 Multiple
      $('.select2-multiple').select2();

      // Bootstrap Date Picker
      $('#simple-date1 .input-group.date').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,        
      });

      $('#simple-date2 .input-group.date').datepicker({
        startView: 1,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date3 .input-group.date').datepicker({
        startView: 2,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date4 .input-daterange').datepicker({        
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });    

      // TouchSpin

      $('#touchSpin1').TouchSpin({
        min: 0,
        max: 100,                
        boostat: 5,
        maxboostedstep: 10,        
        initval: 0
      });

      $('#touchSpin2').TouchSpin({
        min:0,
        max: 100,
        decimals: 2,
        step: 0.1,
        postfix: '%',
        initval: 0,
        boostat: 5,
        maxboostedstep: 10
      });

      $('#touchSpin3').TouchSpin({
        min: 0,
        max: 100,
        initval: 0,
        boostat: 5,
        maxboostedstep: 10,
        verticalbuttons: true,
      });

      $('#clockPicker1').clockpicker({
        donetext: 'Done'
      });

      $('#clockPicker2').clockpicker({
        autoclose: true
      });

      let input = $('#clockPicker3').clockpicker({
        autoclose: true,
        'default': 'now',
        placement: 'top',
        align: 'left',
      });

      $('#check-minutes').click(function(e){        
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
      });

    });
  </script>
</body>

</html>
<?php
 }else{
    header('location: login.php');
}
?>
 
