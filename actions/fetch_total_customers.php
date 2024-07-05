<?php
// fetch_total_customers.php
include 'includes/db_connect.php';

$query = "SELECT COUNT(*) AS totalCustomers FROM customers";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo $row['totalCustomers'];

mysqli_close($conn);
?>
