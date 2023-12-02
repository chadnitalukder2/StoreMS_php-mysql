<?php
    require('connection.php');
    require('myFunction.php');

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
    <title>Spend Product</title>
</head>
<body>
    <?php
    if(isset($_GET ['spend_product_name'])){
     $spend_product_name        =  $_GET['spend_product_name'];
     $spend_product_quientity   =  $_GET['spend_product_quientity'];
     $spend_product_entrydate   =  $_GET['spend_product_entrydate'];
     
 
    $sql ="INSERT INTO  spend_product (spend_product_name, spend_product_quientity, spend_product_entrydate)
           VALUES ('$spend_product_name ', '$spend_product_quientity' , '$spend_product_entrydate')";
 

        if($conn->query($sql) == TRUE){
            echo "Data Inserted";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }

    ?>
   
 

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
   
    Product : <br>
    <select name="spend_product_name">
    <?php
     data_list('product', 'product_id', 'product_name');
    ?>
       
    </select><br><br>
   
    Product Quientity : <br>
    <input type="number" name="spend_product_quientity"><br><br>
    Spend Entry Date : <br>
    <input type="date" name="spend_product_entrydate"><br><br>
    <input type="submit" value="submit">
    </form>
    
</body>
</html>
<?php } 
else{
    header('location: login.php');
}?>
    