<?php
include('auth.php');
checkAuth();
checkRole('admin'); // Only allow admin users to access this page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Page</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>This is a protected page accessible only by admin users.</p>
</body>
</html>
