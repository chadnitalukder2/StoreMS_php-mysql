<?php
require('connection.php');

#=====================login page start=================
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name  = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name) ){  

#=====================login page end=================

$sql1 = "SELECT * FROM product";
$query1 = $conn->query($sql1);

$data_list = array();

while ($data1 = mysqli_fetch_assoc($query1)){ 
    $product_id   = $data1['product_id'];
    $product_name = $data1['product_name'];
   
    $data_list[$product_id ] = $product_name;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of spend Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e9aa5124db.js" crossorigin="anonymous"></script>
    <style>
        table, th, td {
        border: 1px solid;
        }
        </style>
</head>
<body>

<div class="container bg-light">
 <!--==================== Topbar start ================================-->
        <div class="container-foulid border-bottom border-warning"> 
          <?php include('Topbar.php') ?>
        </div>
<!--==================== Topbar end ================================-->
        <div class="container-foulid">
            <div class="row ">   <!-- start of row -->
 <!--==================== star of left ================================-->               
                <div class="col-sm-3 bg-light p-0 m-0">
                <?php include('leftbar.php') ?>
                </div>
<!--==================== end of left ================================-->  
<!--==================== start of right ================================-->  
            <div class="col-sm-9 border-start border-warning">
                      <div class="container  p-5">
 <?php
       $sql =  "SELECT* FROM spend_product" ;
       $query = $conn->query($sql);

    echo "<table class='table table-bordered border-warning' ><tr> <th> ID </th> <th> Product Name </th> <th> Quientity </th> <th> Entry Date </th><th> Action </th></tr> ";

    while ($data = mysqli_fetch_assoc($query)) {
        $spend_product_id         = $data['spend_product_id'];
        $spend_product_name       = $data['spend_product_name'];
        $spend_product_quientity  = $data['spend_product_quientity'];
        $spend_product_entrydate  = $data['spend_product_entrydate'];

   echo "<tr>
        <td> $spend_product_id </td>
        <td> $data_list[$spend_product_name]</td>
        <td> $spend_product_quientity </td>
        <td> $spend_product_entrydate </td>

        <td><a href= 'edit-spend-product.php?id=$spend_product_id'> Edit </a></d> 
    </tr>";
    }
        echo "</table>"
    ?>
         </div>
    </div>
<!--==================== end of right ================================-->  
            </div>  <!-- end of row -->
        </div>
<!--==================== start of bottom ================================-->  
        <div class="container-foulid border-top border-warning">
         <?php include('bottom.php') ?>
        </div>
<!--==================== end of bottom ================================-->  
    </div> <!--  end of container -->
  

    
     
</body>
</html>
<?php } 
else{
    header('location: login.php');
}?>
    