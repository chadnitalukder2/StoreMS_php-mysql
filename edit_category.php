<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
   <?php
     if(isset($_GET['id'])){
        $getid = $_GET['id'];

      $sql = "SELECT * FROM category WHERE Category_id=$getid";
      $query =  $conn->query($sql);
      $data =  mysqli_fetch_assoc( $query);

      $category_id =  $data['Category_id'];
      $category_name =  $data['Category_name'];
      $category_entrydate =  $data['Category_entrydate'];

     } 

      if(isset($_GET['Category_name'])){
       $new_Category_name        = $_GET['Category_name'];
       $new_Category_entrydate   = $_GET['Category_entrydate'];
       $new_Category_id          = $_GET['Category_id'];
        
      $sql1= "UPDATE category SET 
             Category_name='$new_Category_name', 
             Category_entrydate='$new_Category_entrydate' 
             WHERE Category_id  = $new_Category_id  "; 
    
        if($conn->query($sql1) == TRUE ){
            echo "Update Successful";
        }
        else{
            echo "Not Update";
        }

    } 




   ?>

   

    <form action="edit_category.php" method="GET">
        Category : <br>
    <input type="text" name="Category_name" value="<?php echo $category_name  ?>"><br><br>
    Category Entry Date : <br>
    <input type="date" name="Category_entrydate"  value="<?php echo $category_entrydate  ?>"><br><br>
    
    <input type="text" name="Category_id"  value="<?php echo $category_id  ?> " hidden>

    <input type="submit" value="Update">
    </form>
    
</body>
</html>