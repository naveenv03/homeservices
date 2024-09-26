<?php
	$service = $_POST['service'];
	$city = $_POST['city'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into findserv(service, city) values(?, ?)");
		$stmt->bind_param("ss", $service, $city);
		$execval = $stmt->execute();
		echo $execval;
		echo "Service request placed successfully... will contact you soon";
		$stmt->close();
		$conn->close();
	}
?>