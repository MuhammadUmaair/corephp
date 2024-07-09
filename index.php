<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<body>
    <?php include('includes/navbar.php'); ?>
    <div class="container">
        <h2>CRM Dashboard</h2>
        <?php if (isset($_SESSION['username'])): ?>
            <?php if ($_SESSION['role'] === 'admin'): ?>
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
                                <ul class="card-text" id="recentActivities">
                                    <li>No recent activities</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>Welcome to Customer Service Management</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        $(document).ready(function() {
            function fetchData() {
                $.get("actions/fetch_data.php", function(data) {
                    if (!data.error) {
                        $("#totalCustomers").text(data.totalCustomers);

                        var recentActivitiesHtml = "";
                        if (data.recentActivities.length > 0) {
                            data.recentActivities.forEach(function(activity) {
                                recentActivitiesHtml += "<li>" + activity + "</li>";
                            });
                        } else {
                            recentActivitiesHtml = "<li>No recent activities</li>";
                        }
                        $("#recentActivities").html(recentActivitiesHtml);
                    }
                }, "json");
            }

            fetchData(); // Initial fetch
            setInterval(fetchData, 60000); // Fetch data every 60 seconds
        });
    </script>
</body>

</html>
