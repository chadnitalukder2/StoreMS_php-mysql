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
    <title>List of User's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e9aa5124db.js" crossorigin="anonymous"></script>
    <style>
        table, th, td {
        border: 1px solid;
        }
        </style>
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
                      <div class="containe p-5">
                      <?php
       $sql =  "SELECT* FROM user_table" ;
       $query = $conn->query($sql);

    echo "<table class='table table-bordered border-warning' ><tr> <th> ID </th> <th> Fastname </th> <th> Lastname </th> <th> Email </th><th> Password </th><th> Action </th></tr> ";

     while ($data = mysqli_fetch_assoc($query)) {
        $user_id         = $data['user_id'];
        $user_first_name = $data['user_first_name'];
        $user_last_name  = $data['user_last_name'];
        $user_email      = $data['user_email'];
        $user_password   = $data['user_password'];
        echo "<tr>
        <td> $user_id</td>
        <td> $user_first_name </td>
        <td> $user_last_name </td>
        <td> $user_email </td>
        <td> $user_password </td>


        <td><a href= 'edit-user.php?id=$user_id'> Edit </a></d> 
    </tr>";
        }
        echo "</table>"
        ?>

    </div>
</div>
<!--==================== end of right ================================-->  
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
    