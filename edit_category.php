<?php
require ('connection.php');
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
    #===============Gat  data from category start=================================
   if (isset($_GET['id'])) {
    $getid = $_GET['id'];

    $sql = "SELECT * FROM category
            WHERE Category_id = $getid";
    #===============show data start=================================
    $query = $conn->query($sql);
    $data = mysqli_fetch_assoc($query);

    // Check if data exists before accessing the 'Category_id' index
    if ($data) {
        $Category_id = $data['Category_id'];
        $Category_name = $data['Category_name'];
        $Category_entrydate = $data['Category_entrydate'];
    }
}
    #===============Get data from input start=================================

    if(isset($_GET['Category_name'])){
        $new_Category_name = $_GET['Category_name'];
        $new_Category_entrydate = $_GET['Category_entrydate'];
        $new_Category_id = $_GET['Category_id'];
        
    #===============update data start=================================
    $sql1 = "UPDATE category
            SET Category_name      = '$new_Category_name',
                Category_entrydate = '$new_Category_entrydate'
            WHERE Category_id      = '$new_Category_id'";
    if ($conn->query($sql1) === TRUE){
        echo "Update Successful";
    } else {
        echo "Not Update" . $conn->error;
    }
    }


    ?>
   

    <form action="edit_category.php" method="GET">
    Category : <br>
    <input type="text" name="Category_name" value="<?php echo  $Category_name  ?>"><br><br>
    Category Entry Date : <br>
    <input type="date" name="Category_entrydate" value="<?php echo  $Category_entrydate  ?>"><br><br>
    <input type="text" name="Category_id" value="<?php echo  $Category_id  ?> "hidden>
    <input type="submit" value="submit">
    </form>
    
</body>
</html>