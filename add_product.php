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
    <input type="submit" value="submit">
    </form>
    
</body>
</html>