<?php
include 'db.php'; // Include the database connection file

// Collect and sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query to fetch user data
$sql = "SELECT password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the password from the database
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        echo "Login successful";
    } else {
        echo "Invalid password";
    }
} else {
    echo "No user found with this username";
}

$conn->close();
?>

