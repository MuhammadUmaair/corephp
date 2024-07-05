<?php
// save_customer.php
include 'includes/db_connect.php';

// Sanitize inputs
$customerId = mysqli_real_escape_string($conn, $_POST['customerId']);
$customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
$customerEmail = mysqli_real_escape_string($conn, $_POST['customerEmail']);
$customerPhone = mysqli_real_escape_string($conn, $_POST['customerPhone']);
$customerAddress = mysqli_real_escape_string($conn, $_POST['customerAddress']);

// Insert or update based on customerId presence
if (empty($customerId)) {
    $query = "INSERT INTO customers (name, email, phone, address) VALUES ('$customerName', '$customerEmail', '$customerPhone', '$customerAddress')";
} else {
    $query = "UPDATE customers SET name='$customerName', email='$customerEmail', phone='$customerPhone', address='$customerAddress' WHERE id='$customerId'";
}

if (mysqli_query($conn, $query)) {
    echo 'Customer saved successfully.';
} else {
    echo 'Error: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>
