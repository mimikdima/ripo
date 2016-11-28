<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
$servername = "localhost";
$username = "root";
$password = "";
$db = "test_matrix";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: dont found database");
} 

?>