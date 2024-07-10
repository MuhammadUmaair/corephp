<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../pages/auth/auth.php');
checkAuth();
checkRole('admin');
include('../templates/header.php');
$search_value = isset($_GET['search']) ? $_GET['search'] : "";
?>
<body>

    <?php include('../includes/navbar.php'); ?>
    <div class="container mt-5">
        <h2 class="text-center">View Customers</h2>
        <form>
            <div style="float:right;display: flex;" class="mb-2">
                <input type="text" name="search" placeholder="Search..." value="<?php echo $search_value; ?>" class="form-control mr-1">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "crm_db";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $search_query = "SELECT * FROM customers";
                if(!empty($search_value)){
                    $search_query .= " Where name Like '%".$search_value."%' OR email Like '%".$search_value."%' OR phone Like '%".$search_value."%' OR address Like '%".$search_value."%'";
                }
                $result = $conn->query($search_query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                        echo "<td>
                                <a href='edit_customer.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='../actions/delete_customer.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No customers found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
