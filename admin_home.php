<?php
session_start();
require('db.php');
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include('header.php');
include('sidebar.php');
?>

<div class="content">
    <h1>Welcome to Admin Dashboard</h1>
    <div class="cards">
        <div class="card">
            <h2>Manage Users</h2>
            <a href="manage-users.php">Go to Users</a>
        </div>
        <div class="card">
            <h2>Manage Boats</h2>
            <a href="manage-boats.php">Go to Boats</a>
        </div>
        <div class="card">
            <h2>Manage Trips</h2>
            <a href="manage-trips.php">Go to Trips</a>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>