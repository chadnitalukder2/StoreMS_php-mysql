<?php
    require('connection.php');
    require('myFunction.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Store Product</title>
</head>
<body>
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
            }
            else{
                echo "Not Update";
            }
        }
    ?>
   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Product : <br>
        <select name="store_product_name">
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
            <?php
            }
            ?>
        </select><br><br>
       
        Product Quientity : <br>
        <input type="number" name="store_product_quientity" value='<?php echo $store_product_quientity ?>'><br><br>
        Store Entry Date : <br>
        <input type="date" name="store_product_entrydate" value='<?php echo $store_product_entrydate ?>'><br><br>
        <input type="text" name="store_product_id" value='<?php echo $store_product_id ?>' hidden>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>
