<?php
// fetch_customer.php
include 'includes/db_connect.php';

// Sanitize input id
$customerId = mysqli_real_escape_string($conn, $_POST['id']);

// Fetch customer details
$query = "SELECT * FROM customers WHERE id='$customerId'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $customer = mysqli_fetch_assoc($result);
    echo json_encode($customer);
} else {
    echo 'Customer not found.';
}

mysqli_close($conn);
?>
