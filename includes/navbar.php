<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">CRM System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pages/add_customer.php">Add Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pages/view_customer.php">View Customers</a>
            </li>
            <?php if (isset($_SESSION['username'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="../actions/logout.php">Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="pages/auth/login.php">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>