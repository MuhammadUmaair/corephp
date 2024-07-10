<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../pages/auth/auth.php');
checkAuth();
checkRole('admin');
include('../templates/header.php');
?>

<body>

    <?php include('../includes/navbar.php'); ?>
    <div class="container mt-5">
        <h2 class="text-center">Add Customer</h2>
        <form id="addCustomerForm" method="POST" action="../actions/add_customer.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
