<?php
// Database credentials
$servername = "localhost";   // Replace with your database server name
$username = "username";      // Replace with your database username
$password = "password";      // Replace with your database password
$dbname = "test";    // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set UTF-8 encoding
mysqli_set_charset($conn, "utf8");

?>
