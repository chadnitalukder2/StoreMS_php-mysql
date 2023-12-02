<?php
require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of User's</title>
    <style>
        table, th, td {
        border: 1px solid;
        }
        </style>
</head>
<body>
    <?php
       $sql =  "SELECT* FROM user_table" ;

       $query = $conn->query($sql);

    echo "<table><tr> <th> ID </th> <th> Fastname </th> <th> Lastname </th> <th> Email </th><th> Password </th><th> Action </th></tr> ";

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
</body>
</html>