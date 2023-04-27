<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gwsc";
// Establish database connection
$conn = mysqli_connect($servername ,$username,$password, $dbname
);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare and bind the insert statement
$stmt = $conn->prepare("INSERT INTO visitors (first_name, last_name, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $first_name, $last_name, $email);

// Set parameters and execute the statement
$first_name = $_POST['name'];
$last_name = ""; // No last name input for contact form
$email = $_POST['email'];
$stmt->execute();

// Check if insert was successful and display appropriate message to user
if ($stmt->affected_rows > 0) {
    echo "Thank you for your message!";
} else {
    echo "Something went wrong. Please try again later.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
