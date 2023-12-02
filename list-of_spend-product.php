<?php
require('connection.php');

$sql1 = "SELECT * FROM product";
$query1 = $conn->query($sql1);

$data_list = array();

while ($data1 = mysqli_fetch_assoc($query1)){ 
    $product_id   = $data1['product_id'];
    $product_name = $data1['product_name'];
   
    $data_list[$product_id ] = $product_name;
}

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
    <title>List of spend Product</title>
    <style>
        table, th, td {
        border: 1px solid;
        }
        </style>
</head>
<body>
    <?php
       $sql =  "SELECT* FROM spend_product" ;

       $query = $conn->query($sql);

    echo "<table><tr> <th> Product Name </th> <th> Quientity </th> <th> Entry Date </th><th> Action </th></tr> ";

     while ($data = mysqli_fetch_assoc($query)) {
        $spend_product_id         = $data['spend_product_id'];
        $spend_product_name       = $data['spend_product_name'];
        $spend_product_quientity  = $data['spend_product_quientity'];
        $spend_product_entrydate  = $data['spend_product_entrydate'];

   echo "<tr>
        <td> $data_list[$spend_product_name]</td>
        <td> $spend_product_quientity </td>
        <td> $spend_product_entrydate </td>

        <td><a href= 'edit-spend-product.php?id=$spend_product_id'> Edit </a></d> 
    </tr>";
    }
        echo "</table>"
    ?>
</body>
</html>
<?php } 
else{
    header('location: login.php');
}?>
    