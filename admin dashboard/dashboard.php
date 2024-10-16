<?php
session_start();
include('db.php');
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
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
            <h2>Manage Staff</h2>
            <a href="manage-staff.php">Go to Staff</a>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>