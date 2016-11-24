 <?php  
include('conn.php');
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 //if( $column_name == 'on_stock'){
 //if($_POST["on_stock"]=='1'){$on_stock=1;}else{$on_stock=0;}
// }
 $sql = "UPDATE parts SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($conn, $sql))  
 {  
      echo 'Part Updated';  
 }  
 ?>  