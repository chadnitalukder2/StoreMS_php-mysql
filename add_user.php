<?php
    require('connection.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <?php
    if(isset($_GET ['user_first_name'])){
     $user_first_name =  $_GET['user_first_name'];
     $user_last_name  =  $_GET['user_last_name'];
     $user_email      =  $_GET['user_email'];
     $user_password   =  $_GET['user_password'];
     
 
    $sql ="INSERT INTO  user_table (user_first_name, user_last_name, user_email, user_password)
           VALUES ('$user_first_name ', '$user_last_name' , '$user_email', '$user_password')";
 

        if($conn->query($sql) == TRUE){
            echo "Data Inserted";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }

    ?>
   
 

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
   User's Firstname : <br>
    <input type="text" name="user_first_name"><br><br>
    User's LastName : <br>
    <input type="text" name="user_last_name"><br><br>
    User's Email : <br>
    <input type="email" name="user_email"><br><br>
    User's Password : <br>
    <input type="password" name="user_password"><br><br>
    <input type="submit" value="submit">
    </form>
    
</body>
</html>