<?php
function checkAuth()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: pages/auth/login.php");
        exit();
    }
}
function checkLogin()
{
    if (isset($_SESSION['user_id'])) {
        header("Location: /");
        exit();
    }
}

function checkRole($required_role)
{
    if ($_SESSION['role'] != $required_role) {
        echo "Access denied!";
        exit();
    }
}
