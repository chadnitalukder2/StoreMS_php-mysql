<?php
function data_list($table, $column1, $column2){
    require('connection.php');
        $sql   = "SELECT * FROM $table";
        $query = $conn->query($sql);
    
        while ($data  = mysqli_fetch_assoc($query)){
            $data_id   =  $data[$column1];
            $data_name =  $data[$column2];
    
        echo "<option value='$data_id ' > $data_name </option>";
        }
    }
?>