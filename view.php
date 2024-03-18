<?php
// Include your database connection file
include ('connect.php');

// Query to retrieve the first three emails and messages from the database
$sql = "SELECT email, message FROM messages ORDER BY created_at ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="icon" href="js\view.ico" type="image/ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">View Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
            // Check if there are rows returned from the database
            if ($result->num_rows > 0) {
                // Loop through each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Email: ' . $row['email'] . '</h5>
                            <p class="card-text">Message: ' . $row['message'] . '</p>
                            <form method="post" action="delete.php">
                                <input type="hidden" name="email" value="' . $row['email'] . '">
                                <input type="hidden" name="message" value="' . $row['message'] . '">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>';
                
                }
            } else {
                // If no rows are returned, display a message
                echo '<div class="col">
                    <div class="alert alert-info" role="alert">No messages found!</div>
                  </div>';
            }
            ?>
        </div>
    </div>


</body>

</html>

<?php
// Close the database connection
$conn->close();
?>