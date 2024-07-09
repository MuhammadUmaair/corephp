<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
<body>
    <?php include('includes/navbar.php'); ?>
    <div class="container">
        <h2>CRM Dashboard</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Customers</h5>
                        <p class="card-text" id="totalCustomers">0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Activities</h5>
                        <p class="card-text" id="recentActivities">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        $(document).ready(function() {
            // Simulate fetching data from the server
            setInterval(function() {
                $.get("path/to/server/script", function(data) {
                    $("#totalCustomers").text(data.totalCustomers);
                });
            }, 60000); // Every 60 seconds
        });
    </script>
</body>

</html>