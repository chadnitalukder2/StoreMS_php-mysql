<?php
require('connection.php');

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
    <title>Add Product</title>
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
                <div class="container p-5 m-5">
            <?php
    if(isset($_GET ['product_name'])){
     $Product_name        =  $_GET['product_name'];
     $Product_category    =  $_GET['product_category'];
     $Product_code        =  $_GET['product_code'];
     $Product_entrydate   =  $_GET['product_entrydate'];
 
    $sql =" INSERT INTO product (product_name, product_category, product_code, product_entrydate)
           VALUES ('$Product_name ', '$Product_category' , '$Product_code ', '$Product_entrydate ')";
 

        if($conn->query($sql) == TRUE){
            echo "Data Inserted";
        }
        else{
            echo "Data not Inserted";
        }
        }

    ?>
   <?php
        $sql   = "SELECT * FROM category";
        $query = $conn->query($sql);
   ?>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    Product Name : <br>
    <input type="text" name="product_name"><br><br>
    Product Category : <br>
    <select name="product_category">
    <?php
        while ($data  = mysqli_fetch_assoc($query)){
            $category_id   =  $data['Category_id'];
            $category_name =  $data['Category_name'];
  
            echo "<option value='$category_id' > $category_name </option>";
        }
        
    ?>
     </select><br><br>
    Product Code : <br>
    <input type="text" name="product_code"><br><br>
    Product Entry Date : <br>
    <input type="date" name="product_entrydate"><br><br>
    <input type="submit" value="submit" class="btn btn-warning">
    </form>
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
    