<?php
session_start();
include('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize input
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $salary = htmlspecialchars($_POST['salary']);
    $position = htmlspecialchars($_POST['position']);
    $email = htmlspecialchars($_POST['email']);
    $registration_date = date('Y-m-d');
    $id = htmlspecialchars($_POST['staff']);

    // Insert staff member into the database
    $sql = "INSERT INTO Staff (Staff_ID, username, Password, Salary, Email, Position, Hire_date) 
            VALUES ('$id','$username', '$password', '$salary', '$email', '$position', '$registration_date')";

    if ($pdo->query($sql)) {
        header('Location: manage-staff.php?message=Staff+added+successfully');
        exit;
    } else {
        echo "<script>alert('Error adding staff.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="common.css">

</head>
<body>
    <center><h1>Add Staff</h1></center>
    <div class="form-container">
    <form method="POST">
        <label>staff id:</label>
        <input type="text" name="staff" required><br><br><br>

        <label>Username:</label>
        <input type="text" name="username" required><br><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br><br>

        <label>salary:</label>
        <input type="num" name="salary" required><br><br><br>


        <label>Email:</label>
        <input type="email" name="email" required><br><br><br>

        <label>position</label>
        <input type="text" name="position" required><br><br><br>
        

        <button type="submit">Add Staff</button>
    </form>
    </div>

    <script src="validation.js" defer></script>

</body>
</html>