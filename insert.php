<?php  
include('conn.php');
 $sql = "INSERT INTO parts(price, compatible_cars,quantity,information) 
		VALUES('".$_POST["price"]."', '".$_POST["compatible_cars"]."', '".$_POST["quantity"]."', '".$_POST["information"]."')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'New Part Inserted';  
 } 
 ?>  