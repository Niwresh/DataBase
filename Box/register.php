<?php
include 'db.php'; 


$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
$Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
$Mname = mysqli_real_escape_string($conn, $_POST['Mname']);
$Birthday = mysqli_real_escape_string($conn, $_POST['Birthday']);
$Contact = mysqli_real_escape_string($conn, $_POST['Contact']);



$hashed_password = password_hash($password, PASSWORD_DEFAULT);



$sql = "INSERT INTO users (username, email, password, Fname, Lname, Mname, Birthday, Contact)
        VALUES ('$username', '$email', '$hashed_password', '$Fname', '$Lname', '$Mname', '$Birthday', '$Contact')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
