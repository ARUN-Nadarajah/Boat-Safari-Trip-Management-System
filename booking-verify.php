<?php
session_start();
include('db.php');
if (!isset($_SESSION['username'])){
    header('Location: login.php');
    exit();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

function generateBookingID($con)
{
    $sql = "SELECT Booking_ID FROM Reservation ORDER BY Booking_ID DESC LIMIT 1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $LastBookingID = $row['Booking_ID'];
        $lastNumericPart = (int) substr($LastBookingID, 3);
        $newNumericPart = str_pad($lastNumericPart + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $newNumericPart = '01';
    }
    return 'RSV' . $newNumericPart;
}

// $plan = 'test'; // Initialize the variable with a default value

if (isset($_POST['submit'])) {
    $bookID = generateBookingID($con);
    $username = $_SESSION['username'];
    $plan = $_POST['plan_id']; // Get the selected plan ID
    $guest = $_POST['num_guests'];
    $date = $_POST['booking_date'];
    $price = $_POST['total_price']; // Get the calculated price from the frontend

    // Insert into database
    $sql = "INSERT INTO Reservation (Booking_ID, Plan_ID, User_name, Number_of_guest, Booking_date, Total_price)
                VALUES ('$bookID', '$plan', '$username', '$guest', '$date', '$price')";
    if ($con->query($sql) === TRUE) {
        echo "New reservation created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>