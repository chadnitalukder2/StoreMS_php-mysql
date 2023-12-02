<?php
require('connection.php');
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
       $sql =  "SELECT* FROM store_product" ;

       $query = $conn->query($sql);

    echo "<table><tr> <th> Product Name </th> <th> Quientity </th> <th> Entry Date </th><th> Action </th></tr> ";

     while ($data = mysqli_fetch_assoc($query)) {
        $store_product_id         = $data['store_product_id'];
        $store_product_name       = $data['store_product_name'];
        $store_product_quientity  = $data['store_product_quientity'];
        $store_product_entrydate  = $data['store_product_entrydate'];

   echo "<tr>
        <td> $data_list[$store_product_name]</td>
        <td> $store_product_quientity </td>
        <td> $store_product_entrydate </td>

        <td><a href= 'edit_store_product.php?id=$store_product_id'> Edit </a></d> 
    </tr>";
    }
        echo "</table>";
    ?>
</body>
</html>