// script.js
$(document).ready(function() {
    // Function to fetch total customers and recent activities
    function fetchDashboardMetrics() {
        // AJAX request to fetch total customers
        $.ajax({
            url: 'fetch_total_customers.php',
            type: 'GET',
            success: function(response) {
                $('#totalCustomers').text(response);
            }
        });

        // AJAX request to fetch recent activities
        $.ajax({
            url: 'fetch_recent_activities.php',
            type: 'GET',
            success: function(response) {
                $('#recentActivities').text(response);
            }
        });
    }

    // Function to fetch and display customer records
    function fetchCustomers() {
        $.ajax({
            url: 'fetch_customers.php',
            type: 'GET',
            success: function(response) {
                $('#customerTableBody').html(response);
            }
        });
    }

    // Fetch dashboard metrics and customers on page load
    fetchDashboardMetrics();
    fetchCustomers();

    // Handle form submission (add/edit customer)
    $('#customerForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'save_customer.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#customerForm')[0].reset();
                fetchCustomers(); // Refresh customer table after save
            }
        });
    });

    // Handle edit button click (populate form for editing)
    $(document).on('click', '.editBtn', function() {
        var customerId = $(this).data('id');
        $.ajax({
            url: 'fetch_customer.php',
            type: 'POST',
            data: { id: customerId },
            success: function(response) {
                var customer = JSON.parse(response);
                $('#customerId').val(customer.id);
                $('#customerName').val(customer.name);
                $('#customerEmail').val(customer.email);
                $('#customerPhone').val(customer.phone);
                $('#customerAddress').val(customer.address);
            }
        });
    });

    // Implement search functionality
    $('#searchInput').on('keyup', function() {
        var searchText = $(this).val().toLowerCase();
        $('#customerTableBody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
        });
    });
});
