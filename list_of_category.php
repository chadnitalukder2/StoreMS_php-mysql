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
       $sql =  "SELECT* FROM category" ;

       $query = $conn->query($sql);

    echo "<table><tr> <th> Category </th> <th> Date </th>  <th> Action </th></tr> ";

     while ($data = mysqli_fetch_assoc($query)) {
        $category_id = $data['Category_id'];
        $category_name = $data['Category_name'];
        $category_entrydate = $data['Category_entrydate'];

   echo "<tr>
        <td> $category_name</td>
        <td> $category_entrydate </td>
        <td><a href= 'edit_category.php?id=$category_id'> Edit </a></d> 
    </tr>";
    }
        echo "</table>"
    ?>
</body>
</html>