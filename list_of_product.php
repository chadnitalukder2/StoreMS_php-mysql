<?php
require('connection.php');
#=====================login page start=================
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name  = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name) ){  

#=====================login page end=================

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e9aa5124db.js" crossorigin="anonymous"></script>
   
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
                      <div class="container p-5 ">
                      <?php
       $sql =  "SELECT* FROM product" ;
       $query = $conn->query($sql);

    echo "<table class='table table-bordered border-warning' ><tr> <th> Product Name </th> <th> Category </th>  <th> Code </th>  <th> Action </th></tr> ";

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
        </div>
     </div>
<!--==================== start of right ================================-->  
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
    