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
    <title>edit spend Product</title>
</head>
<body>
    <?php
        #===============Get data from category start=================================
        if(isset($_GET['id'])){
            $getid = $_GET['id'];

            $sql   = "SELECT * FROM spend_product
                    WHERE spend_product_id   = $getid";

            #===============show data start=================================

            $query =  $conn->query($sql);
            $data  =  mysqli_fetch_assoc( $query);
  
            $spend_product_id          =  $data['spend_product_id'];
            $spend_product_name       =  $data['spend_product_name'];
            $spend_product_quientity  =  $data['spend_product_quientity'];
            $spend_product_entrydate  =  $data['spend_product_entrydate'];
        }

        #===============Get data from input start=================================
        if(isset($_GET['spend_product_name'])){
            $new_spend_product_id        =  $_GET['spend_product_id'];
            $new_spend_product_name      =  $_GET['spend_product_name'];
            $new_spend_product_quientity =  $_GET['spend_product_quientity'];
            $new_spend_product_entrydate =  $_GET['spend_product_entrydate'];

            #===============update data start================================= 
            $sql1 = "UPDATE spend_product
                    SET spend_product_name   ='$new_spend_product_name',
                    spend_product_quientity  ='$new_spend_product_quientity',
                    spend_product_entrydate  ='$new_spend_product_entrydate'
                    WHERE spend_product_id  = $new_spend_product_id ";
    
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
        <select name="spend_product_name">
            <?php
            $sql   = "SELECT * FROM product";
            $query = $conn->query($sql);

            while ($data  = mysqli_fetch_array($query)){
                $product_id   =  $data['product_id'];
                $product_name =  $data['product_name'];
            ?>
                <option value='<?php echo $product_id ?>' <?php if($spend_product_name == $data['product_id']){echo 'selected';} ?>>
                    <?php echo $product_name ?>
                </option>
            <?php
            }
            ?>
        </select><br><br>
       
        Product Quientity : <br>
        <input type="number" name="spend_product_quientity" value='<?php echo $spend_product_quientity; ?>'><br><br>
        Store Entry Date : <br>
        <input type="date" name="spend_product_entrydate" value='<?php echo $spend_product_entrydate; ?>'><br><br>
        <input type="text" name="spend_product_id" value='<?php echo $spend_product_id; ?>' hidden>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>
<?php } 
else{
    header('location: login.php');
}?>
    