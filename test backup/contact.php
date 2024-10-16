<?php
session_start();
include('db.php'); // Make sure to include your database connection file
include('assets/header.php'); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

function generateBookingID($con)
{
    $sql = "SELECT Inquiry_ID FROM Inquiry ORDER BY Inquiry_ID DESC LIMIT 1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $LastBookingID = $row['Inquiry_ID'];
        $lastNumericPart = (int) substr($LastBookingID, 3);
        $newNumericPart = str_pad($lastNumericPart + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $newNumericPart = '01';
    }
    return 'INQ' . $newNumericPart;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values from the form
    $inquiryID = generateBookingID($con);
    $username = $_SESSION['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];

    // Insert into the database
    $inq = "INSERT INTO Inquiry (Inquiry_ID, User_name, Name, Email, Issue) VALUES ('$inquiryID', '$username', '$name', '$email', '$issue')";

    if ($con->query($inq) === TRUE) {
        echo "<script>alert('Reservation successful! Inquiry ID: $inquiryID')</script>";
        echo "<script>setTimeout(function() { window.location.href = 'home.php'; }, 1000);</script>"; // Redirect after 1 second
    } else {
        $error_message = "Error: " . $con->error;
        echo "<script>alert('$error_message')</script>";
        echo "<script>setTimeout(function() { window.location.href = 'contact.php'; }, 1000);</script>"; // Redirect back to contact page after 1 second
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles/contact.css"> <!-- Optional CSS -->
</head>
<body>

    <div class="container">
        <h2>Contact Us</h2>

        <!-- Contact Form -->
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="input-box">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($_SESSION['username']); ?>" readonly>
            </div>
            <div class="input-box">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['mail']); ?>" readonly>
            </div>
            <div class="input-box">
                <label for="issue">Your Issue:</label>
                <textarea id="issue" name="issue" rows="4" required></textarea>
            </div>
            <button type="submit" id="submit">Submit Inquiry</button>
        </form>
    </div>

</body>
</html>