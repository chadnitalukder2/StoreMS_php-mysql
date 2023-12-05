<?php
$hostname = 'localhost';
$username =  'root';
$password =  '';
$dbname = 'store_db';

$conn = new mysqli($hostname, $username, $password, $dbname );

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    <title>Add Category</title>
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
                <div class="container p-4 m-4">
                <form action="add_category.php" method="GET">
                    Category : <br>
                <input type="text" name="Category_name"><br><br>
                Category Entry Date : <br>
                <input type="date" name="Category_entrydate"><br><br>
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
  

    <?php
    if(isset($_GET ['Category_name'])){
     $Category_name         =  $_GET['Category_name'];
    $Category_entrydate   =  $_GET['Category_entrydate'];
   
    $sql =" INSERT INTO category (Category_name,Category_entrydate)
           VALUES ('$Category_name ', '$Category_entrydate ')";
 
        if($conn->query($sql) == TRUE){
            echo "Data Inserted";
        }
        else{
            echo "Data not Inserted";
        }
        }

    ?>
   

   
</body>
</html>
<?php } 
else{
    header('location: login.php');
}?>
    