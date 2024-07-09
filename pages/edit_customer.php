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
        <h2 class="text-center">Edit Customer</h2>
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
            $stmt = $conn->prepare("SELECT * FROM customers WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form id="editCustomerForm" method="POST" action="../actions/edit_customer.php">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($row['phone_number']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
        <?php
            } else {
                echo "<p class='text-center'>Customer not found</p>";
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