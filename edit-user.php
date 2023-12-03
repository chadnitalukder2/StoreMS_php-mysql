<?php

    require('connection.php');

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
    <title>edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e9aa5124db.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container bg-light">
 <!--==================== Topbar start ================================-->
        <div class="container-foulid border-bottom border-warning bg-warning"> 
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
                    <div class="container p-5">
                    <?php
        #===============Get data from category start=================================
        if(isset($_GET['id'])){
            $getid = $_GET['id'];

            $sql   = "SELECT * FROM user_table
                    WHERE user_id = $getid";

            #===============show data start=================================

            $query =  $conn->query($sql);
            $data  =  mysqli_fetch_assoc($query);
  
            $user_id         =  $data['user_id'];
            $user_first_name =  $data['user_first_name'];
            $user_last_name  =  $data['user_last_name'];
            $user_email      =  $data['user_email'];
            $user_password   =  $data['user_password'];
        }

        #===============Get data from input start=================================
        if(isset($_GET['user_first_name'])){
            $new_user_id         =  $_GET['user_id'];
            $new_user_first_name =  $_GET['user_first_name'];
            $new_user_last_name  =  $_GET['user_last_name'];
            $new_user_email      =  $_GET['user_email'];
            $new_user_password   =  $_GET['user_password'];

            #===============update data start================================= 
            $sql1 = "UPDATE user_table
                SET user_first_name ='$new_user_first_name',
                    user_last_name  ='$new_user_last_name',
                    user_email      ='$new_user_email',
                    user_password   ='$new_user_password'
                WHERE user_id  = $new_user_id ";
    
            if($conn->query($sql1) == TRUE){
                echo "Update Successful";
            }
            else{
                echo "Not Update" . $conn->error;
            }
        }
    ?>
   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        User's Firstname : <br>
        <input type="text" name="user_first_name" value="<?php echo $user_first_name; ?>"><br><br>
        User's LastName : <br>
        <input type="text" name="user_last_name" value="<?php echo $user_last_name; ?>"><br><br>
        User's Email : <br>
        <input type="email" name="user_email" value="<?php echo $user_email; ?>"><br><br>
        User's Password : <br>
        <input type="password" name="user_password" value="<?php echo $user_password; ?>"><br><br>
        <input type="text" name="user_id" value="<?php echo $user_id; ?>"><br><br>
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
    