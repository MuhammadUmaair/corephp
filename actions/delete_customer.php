<!DOCTYPE html>
<html lang="en">

<?php include('../templates/header.php'); ?>
<body>
    
    <?php include('../includes/navbar.php'); ?>
    <div class="container mt-5">
        <h2 class="text-center">Delete Customer</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crm_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $stmt = $conn->prepare("DELETE FROM customers WHERE id=?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "<p class='text-center'>Customer deleted successfully</p>";
            } else {
                echo "<p class='text-center'>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='text-center'>Invalid request</p>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
