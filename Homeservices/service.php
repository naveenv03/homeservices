<?php
// Retrieve the service and city from the POST request
$service = $_POST['service'];
$city = $_POST['city'];

// Database connection
$conn = new mysqli('localhost', 'root', '12345', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Perform a database query to fetch the service information
    $stmt = $conn->prepare("SELECT firstName FROM registration WHERE profession = ? AND city = ?");
    $stmt->bind_param("ss", $service, $city);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Construct the output HTML
        $output = '';
        while ($row = $result->fetch_assoc()) {
            $output .= "<div class='message'>";
            $output .= "<p>Provider: " . $row['firstName'] . "</p>";
            $output .= "<hr>";
            $output .= "</div>";
        }
        
        // Send the output to the client-side JavaScript
        echo $output;
    } else {
        echo "No services found for the given criteria.";
    }

    $stmt->close();
    $conn->close();
}
?>
