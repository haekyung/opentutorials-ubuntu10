<?php
$servername = "localhost";
$username = "root";
$password = "111111";
$dbname = "mydb";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Check connection
if(!$conn){
	die("Connection failed: ".mysqli_connet_error());
}

$sql = "INSERT INTO MyGuests(firstname, lastname, email) VALUES('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests(firstname, lastname, email) VALUES('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests(firstname, lastname, email) VALUES('Julie', 'Dooley', 'julie@example.com')";

//if(mysqli_query($conn, $sql)) {
if(mysqli_multi_query($conn, $sql)) {
	//$last_id = mysqli_insert_id($conn);
	//echo "New record created successfully. Last inserted ID is: ".$last_id;
	
	echo "New records created successfully";
} else {
	echo "Error: ".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>