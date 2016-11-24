<?php

include('conn.php');


//Parts Table
$sql = "CREATE TABLE parts (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
price INT NOT NULL,
compatible_cars VARCHAR(255) NOT NULL,
quantity INT,
information VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table part created successfully"."<br/>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO parts (price,compatible_cars,quantity,information)
VALUES ('100','Mitsubishi Super Lancer model 1997','1','55','left mirror'),
		('55','Kia Sportage 2002,Porshe 2001 ','1','right mirror'),
		('55','lamborghini 2016','1','motor'),
		('55','Kia 2012','20','steering wheel'),
		('55','Kia Sportage 2002,lamborghini 2016','20','wheels'),
		('10','Porshe 2001,Porshe 2020','10','wheels')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully"."<br/>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//Users Table
$sql = "CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY, 
user_status VARCHAR(30) NOT NULL,
login VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql = "INSERT INTO users (user_status,login,password)
VALUES ('administrator','admin','1234'),('manager','manager','manager')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully"."<br/>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



//Orders Table
$sql = "CREATE TABLE orders (
id INT AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
address VARCHAR(255) NOT NULL,
phone INT NOT NULL,
id_of_part INT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}









$conn->close();





?>