<?php
    require('connection.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
     if(isset($_POST ['user_email'])){
        $user_email      =  $_POST['user_email'];
        $user_password   =  $_POST['user_password'];
        
        $sql = "SELECT * FROM user_table
                WHERE  user_email = '$user_email' AND user_password = '$user_password' ";
      
        $query = $conn->query($sql);
        if(mysqli_num_rows($query) > 0){
            header('location: index.php'); #kun location e jabe ta dibe
        }
        else{
            echo "Not ok";
        }
        }
       
    ?>
   
 

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  
    User's Email : <br>
    <input type="email" name="user_email"><br><br>
    User's Password : <br>
    <input type="password" name="user_password"><br><br>
    <input type="submit" value="Login">
    </form>
    
</body>
</html>