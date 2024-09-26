<?php
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '12345', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Check if the user exists
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, perform the unregistration
        $deleteStmt = $conn->prepare("DELETE FROM registration WHERE email = ?");
        $deleteStmt->bind_param("s", $email);
        $deleteStmt->execute();
        
        echo "Unregistration successful!";
    } else {
        echo "Invalid email or password. Please try again.";
    }

    $stmt->close();
    $deleteStmt->close();
    $conn->close();
}
?>
