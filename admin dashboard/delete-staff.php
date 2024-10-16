<?php
session_start();
include('db.php');



if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $username = $_GET['id'];
    

    // SQL query to delete the staff member
    $sql = "DELETE FROM Staff WHERE username = '$username'";

    if ($pdo->exec($sql)) {
        header('Location: manage-staff.php?message=Staff+deleted+successfully');
        exit;
    } else {
        echo "<script>alert('Error deleting staff.');</script>";
    }
} else {
    echo "<script>alert('No staff member specified for deletion.');</script>";
}
?>