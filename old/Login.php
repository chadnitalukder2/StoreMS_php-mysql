<?php
    require('connection.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e9aa5124db.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container ">
    <?php
    #================POST Data====================
     if(isset($_POST ['user_email'])){
        $user_email      =  $_POST['user_email'];
        $user_password   =  $_POST['user_password'];
        
        $sql = "SELECT * FROM user_table
                WHERE  user_email = '$user_email' AND user_password = '$user_password' ";
      
        $query = $conn->query($sql);
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_array($query);
            $user_first_name =  $data['user_first_name'];
            $user_last_name  =  $data['user_last_name'];

            $_SESSION['user_first_name'] = $user_first_name;
            $_SESSION['user_last_name'] = $user_last_name;

            header('location: index.php'); #kun location e jabe ta dibe
        }
        else{
            echo "Not ok";
        }
        }
       
    ?>
       <form class="bg-light" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  
  User's Email : <br>
  <input type="email" name="user_email"><br><br>
  User's Password : <br>
  <input type="password" name="user_password"><br><br>
  <input type="submit" value="Login"class="btn btn-warning">
  </form>
    </div>
    
   
 

 
    
</body>
</html>