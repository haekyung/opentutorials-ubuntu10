<?php
$servername = "localhost";
$username = "root";
$password = "111111";
$dbname = "mydb";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
}

$sql = "INSERT INTO MyGuests(firstname, lastname, email) VALUES('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests(firstname, lastname, email) VALUES('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests(firstname, lastname, email) VALUES('Julie', 'Dooley', 'julie@example.com')";

//if($conn->query($sql) === TRUE) {	
if($conn->multi_query($sql) === TRUE) {
	//$last_id = $conn->insert_id;
	//echo "New record created successfully. Last inserted ID is : ".$last_id;
	
	echo "New records created successfully";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>