<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total customers
$totalCustomersQuery = "SELECT COUNT(*) AS total_customers FROM customers";
$totalCustomersResult = $conn->query($totalCustomersQuery);
$totalCustomers = $totalCustomersResult->fetch_assoc()['total_customers'];

// Fetch recent activities (assuming there's a table for activities)
$recentActivitiesQuery = "SELECT description FROM activities ORDER BY created_at DESC LIMIT 5";
$recentActivitiesResult = $conn->query($recentActivitiesQuery);
$recentActivities = [];
while ($row = $recentActivitiesResult->fetch_assoc()) {
    $recentActivities[] = $row['description'];
}

$conn->close();

echo json_encode([
    'totalCustomers' => $totalCustomers,
    'recentActivities' => $recentActivities
]);
?>
