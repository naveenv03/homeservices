<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
    $profession = $_POST['profession'];
	$city = $_POST['city'];
	// Database connection
	$conn = new mysqli('localhost','root','12345','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number, profession , city) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssiss", $firstName, $lastName, $gender, $email, $password, $number, $profession, $city);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>