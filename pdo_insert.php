<?php
$servername = "localhost";
$username = "root";
$password = "111111";
$dbname = "mydb";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	//set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//$sql = "INSERT INTO MyGuests(firstname, lastname, email) VALUES('John', 'Doe', 'john@example.com')";
	//use exec() because no results are returned
	//$conn->exec($sql);
	//$last_id = $conn->lastInsertId();
	//echo "New record created successfully. Last inserted ID is: ".$last_id;
	
	//begin the transaction
	$conn->beginTransaction();
	//our SQL statements
	$conn->exec("INSERT INTO MyGuests(firstname, lastname, email) VALUES('John', 'Doe', 'john@example.com')");
	$conn->exec("INSERT INTO MyGuests(firstname, lastname, email) VALUES('Mary', 'Moe', 'mary@example.com')");
	$conn->exec("INSERT INTO MyGuests(firstname, lastname, email) VALUES('Julie', 'Dooley', 'julie@example.com')");
	
	//commit the transaction
	$conn->commit();
	echo "New records created successfully";
} catch(PDOException $e) {
	//roll bask the transaction if something failed
	$conn->rollback();
	echo $sql."<br>".$e->getMessage();
}

$conn = null;
?>