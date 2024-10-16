<?php
session_start();
include('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

// Fetch staff member details

$username = htmlspecialchars($_GET['id']);

if ($username) {
    $stmt = $pdo->prepare("SELECT * FROM Staff WHERE username = ?");
    $stmt->execute([$username]);
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $staff) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['Password']);
    $salary = htmlspecialchars($_POST['Salary']);
    $position = htmlspecialchars($_POST['Position']);

    // Update staff member details
    $sql = "UPDATE Staff SET username = '$username', password = '$password', salary = '$salary', position = '$position' WHERE username = '$username'";
    if ($pdo->query($sql)) {
        header('Location: manage-staff.php?message=Staff+updated+successfully');
        exit;
    } else {
        echo "<script>alert('Error updating staff.');</script>";
    }
} else {
    // Handle staff not found
    if (!$staff) {
        echo "<script>alert('Staff member not found.');</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
    <link rel="stylesheet" href="common.css">

</head>
<body>
    <center><h1>Edit Staff</h1></center>
    <div class="form-container">
    <form method="POST">
        <label>username:</label>
        <input type="text" name="first_name" value="<?= $username ?>" required><br>

        <label>password:</label>
        <input type="text" name="last_name" value="<?= $password ?>" required><br>

        <label>salary:</label>
        <input type="email" name="email" value="<?= $salary?>" required><br>

        <label>position:</label>
        <input type="text" name="phone_number" value="<?= $position ?>" required><br>

        <button type="submit">Update Staff</button>
    </form>
    </div>


    <script src="validation.js" defer></script>

</body>
</html>