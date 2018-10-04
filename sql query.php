<!DOCTYPE html>
<html>
	<head>
	<title>sql query</title>
	</head>

	<body>
	connect to sql<br>
	<?php
	$conn = new mysqli("localhost", "root","");
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully<br>";
	$conn->query("CREATE DATABASE book");
	echo "created database book<br>";
	$conn= new mysqli("localhost","root","","book");
	if ($conn->connect_error) {
    die("Connection failed: <br>" . $conn->connect_error);
	} 
	if ($conn->query('CREATE TABLE telepon (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		name VARCHAR(50) NOT NULL,
		telepon VARCHAR(13),
		reg_date TIMESTAMP)')===TRUE) {
		echo "Table telepon created successfully<br>";
	} else {
		echo "Error creating table: <br>" . $conn->error;
	}
	IF($conn->query("
	INSERT INTO telepon(name,telepon)VALUES ('A','010101010101')
	")){
		echo "New records created successfully<br>";
	} else {
		echo "Error " . "<br>" . $conn->error;
	}
	IF($conn->query("
	
	INSERT INTO telepon(name,telepon)VALUES ('B','010101010102')
	")){
		echo "New records created successfully<br>";
	} else {
		echo "Error " . "<br>" . $conn->error;
	}
	IF($conn->query("
	
	INSERT INTO telepon(name,telepon)VALUES ('C','010101010103')")){
		echo "New records created successfully<br>";
	} else {
		echo "Error " . "<br>" . $conn->error;
	}
	$result = $conn->query('SELECT * FROM telepon');


		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["telepon"]. "<br>";
		}

	
	if ($conn->query("UPDATE telepon SET name='S' WHERE name='B'") === TRUE) {
    echo "Record updated successfully<br>";
	} else {
		echo "Error updating record: <br>" . $conn->error;
	}
	$result = $conn->query("SELECT * FROM telepon");


		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["telepon"]. "<br>";
		}

	if ($conn->query("DELETE FROM telepon WHERE name='A' ")) {
    echo "Record updated successfully<br>";
	} else {
		echo "Error updating record: <br>" . $conn->error;
	}
	$result = $conn->query("SELECT * FROM telepon");

	
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["telepon"]. "<br>";
		}
	
	?>
	</body>
</html>