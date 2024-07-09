<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone_number'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    
    $stmt = $conn->prepare("INSERT INTO customers (name, email, phone_number, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone_number, $address);
    
    if ($stmt->execute()) {
        // Record the activity
        $userId = $_SESSION['user_id'];
        $activityDescription = "Added a new customer: $name";
        
        $activityStmt = $conn->prepare("INSERT INTO activities (user_id, description) VALUES (?, ?)");
        $activityStmt->bind_param("is", $userId, $activityDescription);
        $activityStmt->execute();
        $activityStmt->close();
        
        echo "<p class='text-center'>Customer added successfully</p>";
    } else {
        echo "<p class='text-center'>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>
