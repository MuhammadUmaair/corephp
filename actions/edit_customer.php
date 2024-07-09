<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone_number'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("UPDATE customers SET name=?, email=?, phone_number=?, address=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $phone_number, $address, $id);
    if ($stmt->execute()) {
        echo "Customer updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
