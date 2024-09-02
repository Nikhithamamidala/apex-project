<?php

include_once 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = " delete FROM display.php where id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
            //echo "successfully deleted row with id ";
            
    }
    else{
        die(mysqli_error($con));
    }
}
?>
<!-- <br>
<a href = "display.php"><button type="button">DISPLAY PAGE</button></a> -->
