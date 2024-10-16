<?php
session_start();
include('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

// Check if the username is set in the URL
if (isset($_GET['id'])) {
    $username = htmlspecialchars($_GET['id']); // Sanitize input

    // Fetch user data from the database
    $user = $pdo->query("SELECT * FROM User WHERE User_name = '$username'")->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if (!$user) {
        echo "<script>alert('User not found.');</script>";
        header('Location: manage-users.php');
        exit;
    }
} else {
    header('Location: manage-users.php');
    exit;
}

// Update user if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('invalid Email')</script>";
    }

    $sql = "UPDATE User SET 
                First_Name = '" . htmlspecialchars($_POST['first_name']) . "',
                Last_Name = '" . htmlspecialchars($_POST['last_name']) . "',
                Email = '" . htmlspecialchars($_POST['email']) . "',
                phoneNumber = '" . htmlspecialchars($_POST['phone_number']) . "'
            WHERE User_name = '$username'";

  

    if ($pdo->query($sql)) {
        header('Location: manage-users.php?message=User+updated+successfully');
        exit;
    } else {
        echo "<script>alert('Error updating user.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="common.css">

</head>

<body>
    <center><h1>Edit User</h1></center>
    <div class="form-container">
    <form method="POST">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($user['First_Name']); ?>" required><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($user['Last_Name']); ?>" required><br>

        <label>Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['Email']); ?>" required><br>

        <label>Phone Number:</label>
        <input type="text" name="phone_number" value="<?= htmlspecialchars($user['phoneNumber']); ?>" required><br>

        <button type="submit">Update User</button>
    </form>
    </div>



    <script src="validation.js" defer></script>

</body>

</html>