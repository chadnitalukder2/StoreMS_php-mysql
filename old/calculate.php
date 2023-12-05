<?php
 require('connection.php');
#===========================data show========================================

$sql = "SELECT * FROM spend_product";
$query = $conn->query($sql);

#=========================start product name show id teke===============================
$datalist = array();
$sql1 = "SELECT * FROM product";
$query1 = $conn->query($sql1);

while($data1 = $query1->fetch_assoc() ){
    $product_id   =  $data1['product_id'];
    $product_name =  $data1['product_name'];

    $datalist[$product_id] = $product_name;
}
#=========================end product name show id teke===============================
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
#===========================data show========================================
#=================================total=======================
        $sl = 0;
        $total = 0;
        while($row = $query->fetch_array()){
            $spend_product_name      =  $row['spend_product_name'];
            $spend_product_quientity =  $row['spend_product_quientity'];
            $spend_product_entrydate =  $row['spend_product_entrydate'];
            $sl++; 

            $total += $spend_product_quientity;
    ?>
    <tr>
      <th scope="row"><?php echo $sl ; ?></th>
      <td><?php echo$datalist[$spend_product_name] ; ?></td>
      <td><?php echo $spend_product_quientity ; ?></td>
      <td><?php echo $spend_product_entrydate ; ?></td>
    </tr>
  <?php } ?>
      <tr>
        <td></td>
        <td>Total</td>
        <td><strong><?php echo  $total;  ?></strong></td>
        <td></td>
      </tr>
    
  </tbody>
</table>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>