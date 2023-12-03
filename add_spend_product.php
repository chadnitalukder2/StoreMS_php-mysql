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
                      <div class="container p-3 m-3">
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
   <input type="submit" value="submit" class="btn btn-warning">
   </form>
   
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
    