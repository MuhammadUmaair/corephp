<!DOCTYPE html>
<html lang="en">

<?php include('../templates/header.php'); ?>

<body>

    <?php include('../includes/navbar.php'); ?>
    <div class="container mt-5">
        <h2 class="text-center">Add Customer</h2>
        <?php
        require_once '../includes/db_connect.php';

        $database = new Database();
        $db = $database->getConnection();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $address = htmlspecialchars($_POST['address']);
            $phone_number = htmlspecialchars($_POST['phone_number']);

            $query = "INSERT INTO customers (name, email,address, phone_number) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $address);
            $stmt->bindParam(4, $phone_number);

            if ($stmt->execute()) {
                echo "<p class='text-center'>Customer added successfully</p>";
            } else {
                echo "<p class='text-center'>Error: " . $stmt->error . "</p>";
            }
        }
        ?>
    </div>
</body>

</html>