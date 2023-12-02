<?php
    require('connection.php');
  
#=====================login page start=================
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name  = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name) ){  

#=====================login page end=================
# ===========convert id to name===========================
$sql3 = "SELECT * FROM product";
$query3 = $conn->query($sql3);

$data_list = array();

while ($data3 = mysqli_fetch_assoc($query3)){ 
    $product_id   = $data3['product_id'];
    $product_name = $data3['product_name'];
   
    $data_list[$product_id ] = $product_name;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<style>
        table, th, td {
        border: 1px solid;
        }
    </style>
<body>
    <?php

    ?>
<!--=======================Get Value start===================================== -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    Select Product Name :
    <select name="product_name">
    <?php
        $sql =  "SELECT* FROM product" ;
        $query = $conn->query($sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $product_id       = $data['product_id'];
            $product_name     = $data['product_name'];
    ?>

    <option value="<?php echo $product_id;  ?>"><?php echo $product_name;  ?></option>
     <?php } ?>
    </select>
    
    <input type="submit" value="Generate Report">
    </form>
<!--=======================Get Value end===================================== -->
<!--=======================Show report store data start===================================== -->
  <h1>Store Product</h1>
  <?php
        if(isset($_GET['product_name'])){
            $product_name =  $_GET['product_name'];
        
            $sql1 = "SELECT * FROM store_product
                    WHERE store_product_name = $product_name ";
        
            $query1 = $conn->query($sql1);

            while ( $data1 = mysqli_fetch_array($query1)){
            $store_product_quientity = $data1['store_product_quientity'];
            $store_product_name      = $data1['store_product_name'];
            $store_product_entrydate = $data1['store_product_entrydate'];
                
            echo "<h2>$data_list[$store_product_name] </h2>";
            echo "<table><tr><th> Store Data </th> <th> Amount </th> </tr>";
            echo "<tr> <td>$store_product_entrydate</td> <td>$store_product_quientity</td> </tr>";
            echo "</table>";
            }
        }
        ?>
<!-- =======================Show report store data end================================== -->
<!--=======================Show report Spend data start===================================== -->
  <h1>Spend Product</h1>
 <?php
  if(isset($_GET['product_name'])){
    $product_name =  $_GET['product_name'];

    $sql4 = "SELECT * FROM spend_product
            WHERE spend_product_name = $product_name ";

    $query4 = $conn->query($sql4);

    while ( $data4 = mysqli_fetch_array($query4)){
    $spend_product_quientity = $data4['spend_product_quientity'];
    $spend_product_name      = $data4['spend_product_name'];
    $spend_product_entrydate = $data4['spend_product_entrydate'];
        
    echo "<h2>$data_list[$spend_product_name] </h2>";
    echo "<table><tr><th> Spend Data </th> <th> Amount </th> </tr>";
    echo "<tr> <td>$spend_product_entrydate</td> <td>$spend_product_quientity</td> </tr>";
    echo "</table>";
    }
}
 ?>
 <!--=======================Show report Spend data start===================================== -->
</body>
</html>
<?php } 
else{
    header('location: login.php');
}?>
    