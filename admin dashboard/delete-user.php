<?php
session_start();
include('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

// Check if the username is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the username to prevent SQL injection
    $username = htmlspecialchars($_GET['id']); // Using htmlspecialchars to sanitize input

    // Prepare the delete statement using User_name as the unique identifier
    $sql = "DELETE FROM User WHERE User_name = '$username'"; 

    // Execute the delete statement
    if ($pdo->query($sql)) {
        header('Location: manage-users.php?message=User+deleted+successfully');
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
} else {
    echo "<script>alert('No user ID provided.');</script>";
}
?>