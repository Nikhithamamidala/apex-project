<?php
$con=new mysqli('localhost:4306','root','','crudoperations');
 
if($con)
{
    echo "connect";
   #echo "<h2>delete successfully</h2>";
}
else{
   die(mysqli_error($con));
}


?>
