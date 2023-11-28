<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <?php
      if(isset($_GET['id'])){
         $getid = $_GET['id'];

         $sql   = "SELECT * FROM product WHERE product_id = $getid";
         $query =  $conn->query($sql);
         $data  =  mysqli_fetch_assoc( $query);
   
         $product_id         =  $data['product_id'];
         $product_name       =  $data['product_name'];
         $product_category   =  $data['product_category'];
         $product_code       =  $data['product_code'];
         $product_entrydate  =  $data['product_entrydate'];
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
   
        <option value='<?php echo $category_id ?>' 
        <?php if($category_id  == $product_category){echo 'selected';}  ?> >
        <?php echo $category_name ?>
        </option>";
    
    <?php  }   ?>
        
 
       
    </select><br><br>
   
    Product Code : <br>
    <input type="text" name="product_code" value="<?php echo $product_code   ?>"><br><br>
    Product Entry Date : <br>
    <input type="date" name="product_entrydate" value="<?php echo $product_entrydate ?>"><br><br>
    <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden>
    <input type="submit" value="submit">
    </form>
    
</body>
</html>