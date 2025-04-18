<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form submitted!<br>";

    // Database connection settings
    $servername = "localhost";
    $username = "root";       // Your MySQL username
    $password = "Anjuyogi@4369";  // Your MySQL password
    $database = "portfolio_db";   // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected to database!<br>";
    }

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $purpose = $_POST['purpose'];
    $meeting_time = $_POST['meeting_time'];
    $message = $_POST['message'];

    // Debugging: Print form data
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone: " . $phone . "<br>";
    echo "Purpose: " . $purpose . "<br>";
    echo "Meeting Time: " . $meeting_time . "<br>";
    echo "Message: " . $message . "<br>";

    // SQL query to insert data into the visitors table
    $sql = "INSERT INTO visitors (name, email, phone, purpose, meeting_time, message) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $phone, $purpose, $meeting_time, $message);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "Your details have been saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted.";
}
?>
