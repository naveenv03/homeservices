<?php
// Retrieve the updated name and profession from the form data
$updatedName = $_POST['agentName'];
$updatedProfession = $_POST['profession'];

// Validate the updated name and profession fields (add your validation rules here)
if (empty($updatedName) || empty($updatedProfession)) {
    echo "Please enter both the name and updated profession";
    exit;
}

$conn = new mysqli('localhost','root','12345','test');

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the profession field in the database for the given name (modify the table and column names accordingly)
$sql = "UPDATE registration SET profession='$updatedProfession' WHERE firstName='$updatedName'";

if ($conn->query($sql) === TRUE) {
    echo "Profession updated successfully for $updatedName";
} else {
    echo "Error updating profession: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
