<?php
session_start();
include('conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_SESSION['manager'])) {
 // echo "Your session is running " . $_SESSION['manager'];
}

if(isset($_SESSION["manager"])){
$sql = "SELECT price,compatible_cars, information ,on_stock, quantity
		FROM parts";
$result = $conn->query($sql);
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Price</th><th>Compatible Cars</th><th>Information</th><th>On Stock</th><th>Quantity</th></tr>';
		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';
		echo '<a href = "logout.php" tite = "Logout">Logout</a>';
}else{
$sql = "SELECT price,compatible_cars, information
		FROM parts";
$result = $conn->query($sql);
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Price</th><th>Compatible Cars</th><th>Information</th></tr>';
		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';	
}	

?>
<html>
<head>
<style>
table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style>
</head>
<body>
</body>
</html>