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
        <div class="container-foulid border-bottom border-warning bg-warning"> 
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
                  <div class="container p-5">
                  <?php
#===============Gat  data from product start=================================
        if(isset($_GET['id'])){
          $getid = $_GET['id'];

        $sql = "SELECT * FROM product
                WHERE product_id = $getid";
#===============show data start=================================

        $query =  $conn->query($sql);
        $data  =  mysqli_fetch_assoc($query);

        $product_id         =  $data['product_id'];
        $product_name       =  $data['product_name'];
        $product_category   =  $data['product_category'];
        $product_code       =  $data['product_code'];
        $product_entrydate  =  $data['product_entrydate'];
    }
 #===============Get data from input start=================================

    if(isset($_GET['product_name'])){
        $new_product_id        =  $_GET['product_id'];
        $new_product_name      =  $_GET['product_name'];
        $new_product_category  =  $_GET['product_category'];
        $new_product_code      =  $_GET['product_code'];
        $new_product_entrydate =  $_GET['product_entrydate'];

#===============update data start=================================
        $sql1 = "UPDATE product
                SET product_name    ='$new_product_name',
                    product_category  ='$new_product_category',
                    product_code      ='$new_product_code',
                    product_entrydate ='$new_product_entrydate'
                WHERE product_id  = $new_product_id  ";

        if($conn->query($sql1) == TRUE ){
             echo "Update Successful";
        }
        else{
         echo "Not Update";
        }
        }
    ?>
  <?php
        $sql   = "SELECT * FROM category";
        $query = $conn->query($sql);
    ?>
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    Product Name : <br>
    <input type="text" name="product_name" value="<?php echo $product_name ?>"><br><br>
    Product Category : <br>
    <select name="product_category">
    <?php
        while ($data  = mysqli_fetch_assoc($query)){
            $category_id   =  $data['Category_id'];
            $category_name =  $data['Category_name'];
    ?>
      <option value='<?php echo $category_id; ?>' 
        <?php if($category_id  == $product_category){echo 'selected';}  ?> >
        <?php echo $category_name ;?>
        </option>";
        
    
    <?php  }   ?>

    </select><br><br>
   
    Product Code : <br>
    <input type="text" name="product_code" value="<?php echo $product_code ;  ?>"><br><br>
    Product Entry Date : <br>
    <input type="date" name="product_entrydate" value="<?php echo $product_entrydate ?>"><br><br>
    <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden>
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
    