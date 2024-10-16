<?php


include('db.php'); 
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
        $newNumericPart = '001';
    }
    return 'INQ' . $newNumericPart;
}

// Handle Deletion
if (isset($_POST['delete_inquiry'])) {
    $inquiryID = $_POST['inquiry_id'];

    $del_sql = "DELETE FROM Inquiry WHERE Inquiry_ID = '$inquiryID' AND User_name = '{$_SESSION['username']}'";
    if ($con->query($del_sql) === TRUE) {
        echo "<script>alert('Inquiry deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting inquiry: " . $con->error . "');</script>";
    }
}

// Handle Inquiry Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete_inquiry'])) {
    $inquiryID = generateBookingID($con);
    $username = $_SESSION['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];
    $date = date('Y-m-d');

    $inq = "INSERT INTO Inquiry (Inquiry_ID, User_name, Name, Email, Issue, Date) 
            VALUES ('$inquiryID', '$username', '$name', '$email', '$issue','$date')";

    if ($con->query($inq) === TRUE) {
        echo "<script>alert('Inquiry submitted successfully! Inquiry ID: $inquiryID');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
    }
}

// Fetch inquiries made by the user
$username = $_SESSION['username'];
$inquiries = [];
$sql = "SELECT * FROM Inquiry WHERE User_name = '$username' ORDER BY Inquiry_ID DESC";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $inquiries[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles/contact.css">
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

        <h3>Your Inquiries</h3>
        <?php if (count($inquiries) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Inquiry ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Issue</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inquiries as $inquiry): ?>
                        <tr>
                            <td><?= htmlspecialchars($inquiry['Inquiry_ID']); ?></td>
                            <td><?= htmlspecialchars($inquiry['Name']); ?></td>
                            <td><?= htmlspecialchars($inquiry['Email']); ?></td>
                            <td><?= htmlspecialchars($inquiry['Issue']); ?></td>
                            <td><?= htmlspecialchars($inquiry['Date']); ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="inquiry_id" value="<?= htmlspecialchars($inquiry['Inquiry_ID']); ?>">
                                    <button type="submit" name="delete_inquiry" onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No inquiries found.</p>
        <?php endif; ?>
    </div>

</body>
</html>