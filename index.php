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
            <div class="row p-3">
                <div class="col-sm-9">
                    <h1><a href="index.php" class="text-warning text-decoration-none"> Store Management System.</a> </h1>
                </div>
                <div class="col-sm-3">
                <p class="pt-3"> <?php echo $user_first_name.' '.$user_last_name;  ?>
                <a href= "logout.php" class="text-dark text-decoration-none btn btn-warning py-1 m-0 "> Logout</a>
                </p>
                </div>
            </div>
            
        </div>
<!--==================== Topbar end ================================-->
        <div class="container-foulid">
            <div class="row ">   <!-- start of row -->
 <!--==================== star of left ================================-->               
                <div class="col-sm-3 bg-light p-0 m-0">
                    <h5 class="bg-warning text-black p-2">Category</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="add_category.php" class="text-dark text-decoration-none">
                             Add Categori</a>
                        </li>
                        <li class="list-group-item">
                            <a href="list_of_category.php" class="text-dark text-decoration-none">
                            Categori List</a>
                        </li>
                    </ul>

                    <h5 class="bg-warning text-black p-2">Product</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="add_product.php" class="text-dark text-decoration-none">
                             Add Product</a>
                        </li>
                        <li class="list-group-item">
                            <a href="list_of_product.php" class="text-dark text-decoration-none">
                            Product List</a>
                        </li>
                    </ul>

                    <h5 class="bg-warning text-black p-2">Store Product</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="add_store_product.php" class="text-dark text-decoration-none">
                             Add Store Product</a>
                        </li>
                        <li class="list-group-item">
                            <a href="list_of_store_product_entry.php" class="text-dark text-decoration-none">
                            Store Product List</a>
                        </li>
                    </ul>

                    <h5 class="bg-warning text-black p-2">Spend Product</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="add_spend_product.php" class="text-dark text-decoration-none">
                             Add Spend Product</a>
                        </li>
                        <li class="list-group-item">
                            <a href="list-of_spend-product.php" class="text-dark text-decoration-none">
                            Spend Product List</a>
                        </li>
                    </ul>
                </div>
<!--==================== end of left ================================-->  
<!--==================== start of right ================================-->  
                <div class="col-sm-9">
                    <div class="row p-4">
                        <div class="col-sm-3">
                           <a href="add_category.php"> <i class="fa-solid fa-folder-plus fa-7x text-warning"></i></a>
                            <p>Add Category</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="list_of_category.php"><i class="fa-solid fa-folder-open fa-7x text-warning"></i></a>
                            <p>Category List</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="add_product.php"><i class="fas fa-box-open fa-7x text-warning"></i></a>
                            <p>Add Product </p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_product.php"><i class="fas fa-stream fa-7x text-warning"></i></a>
                            <p>Product List</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row p-4">
                        <div class="col-sm-3">
                           <a href="add_store_product.php"> <i class="fas fa-trash-restore fa-7x text-warning"></i></a>
                            <p>Add Store Product</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="list_of_store_product_entry.php"><i class="fas fa-box fa-7x text-warning"></i></a>
                            <p>Store Product List</p>
                        </div>
                        <div class="col-sm-3">
                             <a href="add_spend_product.php"><i class="fas fa-box-open fa-7x text-warning"></i></a>
                            <p>Add Spend Product </p>
                        </div>
                        <div class="col-sm-3">
                            <a href="list-of_spend-product.php"><i class="fas fa-stream fa-7x text-warning"></i></a>
                            <p>Spend Product List</p>
                        </div>
                    </div>
                </div>
<!--==================== start of right ================================-->  
            </div>  <!-- end of row -->
        </div>
<!--==================== start of bottom ================================-->  
        <div class="container-foulid border-top border-warning">
           <p class="text-center p-2">Copyright : @puja</p>
        </div>
<!--==================== end of bottom ================================-->  
    </div> <!--  end of container -->
  
   

</body>
</html>

<?php } 
else{
    header('location: login.php');
}?>
    