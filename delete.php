<?php
// Include your database connection file
include('connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and message from the form
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare a DELETE statement
    $sql = "DELETE FROM messages WHERE email = ? AND message = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ss", $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the view page with success message
        header("Location: view.php?success=true&message=Message deleted successfully");
        exit();
    } else {
        // Redirect to the view page with error message
        header("Location: view.php?success=false&message=Failed to delete message");
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
