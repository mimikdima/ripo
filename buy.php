<?php

include('conn.php');




 $sql = "INSERT INTO orders(name, address,phone,id_of_part) 
		VALUES('".$_POST["name"]."', '".$_POST["address"]."', '".$_POST["phone"]."', '".$_POST["part_id"]."')";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'New Order Inserted';  
 } 




?>