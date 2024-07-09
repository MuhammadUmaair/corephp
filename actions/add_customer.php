<?php
require_once '../includes/db_connect.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone_number = htmlspecialchars($_POST['phone_number']);

    $query = "INSERT INTO customers (name, email, phone_number) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $phone_number);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Customer added."));
    } else {
        echo json_encode(array("message" => "Unable to add customer."));
    }
}
