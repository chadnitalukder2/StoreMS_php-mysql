<?php
#=====================login page start=================
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name  = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name) ){  

#=====================login page end=================

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management System. | SMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e9aa5124db.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container bg-light">
 <!--==================== Topbar start ================================-->
        <div class="container-foulid border-bottom border-warning"> 
          <?php include('Topbar.php') ?>
        </div>
<!--==================== Topbar end ================================-->
        <div class="container-foulid">
            <div class="row ">   <!-- start of row -->
 <!--==================== star of left ================================-->               
                <div class="col-sm-3 bg-light p-0 m-0">
                <?php include('leftbar.php') ?>
                </div>
<!--==================== end of left ================================-->  
<!--==================== start of right ================================-->  
                <div class="col-sm-9 border-start border-warning">
                    <div class="row p-4 ">
                        <div class="col-sm-3">
                           <a href="add_category.php"> <i class="fa-solid fa-folder-plus fa-5x text-warning"></i></a>
                            <p>Add Category</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="list_of_category.php"><i class="fa-solid fa-folder-open fa-5x text-warning"></i></a>
                            <p>Category List</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="add_product.php"><i class="fas fa-box-open fa-5x text-warning"></i></a>
                            <p>Add Product </p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_product.php"><i class="fas fa-stream fa-5x text-warning"></i></a>
                            <p>Product List</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row p-4">
                        <div class="col-sm-3">
                           <a href="add_store_product.php"> <i class="fas fa-trash-restore fa-5x text-warning"></i></a>
                            <p>Add Store Product</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="list_of_store_product_entry.php"><i class="fas fa-box fa-5x text-warning"></i></a>
                            <p>Store Product List</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="add_spend_product.php"><i class="fas fa-plus-circle fa-5x text-warning"></i></a>
                            <p>Add Spend Product </p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list-of_spend-product.php"><i class="fas fa-window-restore fa-5x text-warning"></i></a>
                            <p>Spend Product List</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row p-4">
                        <div class="col-sm-3">
                           <a href="Report.php"> <i class="fas fa-chart-bar fa-5x text-warning"></i></a>
                            <p>Report</p>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                    </div>
                    <hr>
                    <div class="row p-4">
                        <div class="col-sm-3">
                           <a href="add_user.php"> <i class="fas fa-user-plus fa-5x text-warning"></i></a>
                            <p>Add User</p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_user.php"> <i class="fas fa-users fa-5x text-warning"></i></a>
                            <p>User List</p>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                    </div>
                </div>
<!--==================== start of right ================================-->  
            </div>  <!-- end of row -->
        </div>
<!--==================== start of bottom ================================-->  
        <div class="container-foulid border-top border-warning">
         <?php include('bottom.php') ?>
        </div>
<!--==================== end of bottom ================================-->  
    </div> <!--  end of container -->
  
   

</body>
</html>

<?php } 
else{
    header('location: login.php');
}?>
    