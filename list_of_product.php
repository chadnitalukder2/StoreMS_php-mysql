<?php
require('connection.php');

$sql1 = "SELECT * FROM category";
$query1 = $conn->query($sql1);

$data_list = array();

while ($data1 = mysqli_fetch_assoc($query1)){ 
    $Category_id   = $data1['Category_id'];
    $Category_name = $data1['Category_name'];
   
    $data_list[$Category_id ] = $Category_name;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Category</title>
    <style>
        table, th, td {
        border: 1px solid;
        }
        </style>
</head>
<body>
    <?php
       $sql =  "SELECT* FROM product" ;

       $query = $conn->query($sql);

    echo "<table><tr> <th> Product Name </th> <th> Category </th>  <th> Code </th>  <th> Action </th></tr> ";

     while ($data = mysqli_fetch_assoc($query)) {
        $product_id       = $data['product_id'];
        $product_name     = $data['product_name'];
        $product_category = $data['product_category'];
        $product_code     = $data['product_code'];

   echo "<tr>
        <td> $product_name </td>
        <td> $data_list[$product_category] </td>
        <td> $product_code </td>

        <td><a href= 'edit_product.php?id=$product_id'> Edit </a></d> 
    </tr>";
    }
        echo "</table>"
    ?>
</body>
</html>