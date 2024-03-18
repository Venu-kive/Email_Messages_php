<?php
// Include database connection
include('connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email']; // Assuming you need email to identify the message to edit
    $message = $_POST['message'];

    // SQL query to update the message in the database based on email
    $sql = "UPDATE messages SET message='$message' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php with success message as a query parameter
        header('Location: index.php?success=true&message=Message%20updated%20successfully');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
