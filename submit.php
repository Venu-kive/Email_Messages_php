<?php
include('connect.php');

// Check if form is submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check if email and message are empty
    if (empty($email) || empty($message)) {
        echo '<script>alert("Please enter both email and message."); window.location.href = "index.php";</script>';
        exit; // Stop further execution
    }

    // SQL query to insert data into table
    $sql = "INSERT INTO messages (email, message) VALUES ('$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message as a query parameter
        header('Location: index.php?success=true&message=Message%20sent%20successfully');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
