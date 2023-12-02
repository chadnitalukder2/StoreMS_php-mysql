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
</head>
<body>
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
   

    <form action="add_category.php" method="GET">
        Category : <br>
    <input type="text" name="Category_name"><br><br>
    Category Entry Date : <br>
    <input type="date" name="Category_entrydate"><br><br>
    <input type="submit" value="submit">
    </form>
    
</body>
</html>
<?php } 
else{
    header('location: login.php');
}?>
    