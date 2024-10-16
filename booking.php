<?php
session_start();
include('db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

$plan = ''; // Initialize the $plan variable

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
        $newNumericPart = '001';
    }
    return 'RSV' . $newNumericPart;
}

$bookID = generateBookingID($con);
$username = $_SESSION['username'];

// Check if the form is submitted for a new reservation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $plan = $_POST['plan_id'] ?? ''; // Get the selected plan ID safely
    $guest = $_POST['num_guests'] ?? 0; // Get the number of guests safely
    $date = $_POST['booking_date'] ?? ''; // Get the booking date safely
    $price = $_POST['total_price'] ?? 0; // Get the total price safely

    if (!empty($plan) && !empty($guest) && !empty($date)) {
        $bookID = generateBookingID($con);

        // Insert into the database
        $sql = "INSERT INTO Reservation (Booking_ID, Plan_ID, User_name, Number_of_guest, Booking_date, Total_price)
                    VALUES ('$bookID', '$plan', '$username', '$guest', '$date', '$price')";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Reservation successful! Booking ID: $bookID')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Please fill in all required fields.";
    }
}

// Handle reservation deletion
if (isset($_POST['delete_reservation'])) {
    $bookingID = $_POST['booking_id'];

    $del_sql = "DELETE FROM Reservation WHERE Booking_ID = '$bookingID' AND User_name = '$username'";
    if ($con->query($del_sql) === TRUE) {
        echo "<script>alert('Reservation deleted successfully!');</script>";
    } else {
        echo "Error deleting reservation: " . $con->error;
    }
}

// Fetch reservations made by the user
$reservations = [];
$sql = "SELECT * FROM Reservation WHERE User_name = '$username' ORDER BY Booking_ID DESC";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Page</title>
    <link rel="stylesheet" href="styles/booking.css">
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <a href="home.php"><span style="float: right; cursor:pointer;">❌</span></a>
            <h2>Book Your Trip</h2>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                <!-- Plan ID -->
                <label for="plan_id">Plan ID:</label>
                <select id="plan_id" name="plan_id" required>
                    <option value="PLN01" data-price="100">PLN01</option>
                    <option value="PLN02" data-price="150">PLN02</option>
                    <option value="PLN03" data-price="200">PLN03</option>
                    <option value="PLN04" data-price="200">PLN04</option>
                </select>

                <!-- User Name -->
                <div class="input-box">
                    <label for="user_name">User Name:</label>
                    <input type="text" id="user_name" name="user_name" value="<?= $_SESSION['username'] ?>" readonly>
                    <?= $bookID ?>
                </div>

                <!-- Number of Guests -->
                <div class="input-box">
                    <label for="num_guests">Number of Guests:</label>
                    <input type="number" id="num_guests" name="num_guests" min="1" max="10" required>
                </div>

                <!-- Booking Date -->
                <div class="input-box">
                    <label for="booking_date">Booking Date:</label>
                    <input type="date" id="booking_date" name="booking_date" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" required>
                </div>

                <!-- Total Price -->
                <div class="input-box">
                    <label for="total_price">Total Price:</label>
                    <input type="text" id="total_price" name="total_price" value="0" readonly>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submit">Submit</button>

                <!-- Display the selected plan only if the form is submitted -->
                <?php if (!empty($plan)): ?>
                    <p>Selected Plan: <?= htmlspecialchars($plan) ?></p>
                <?php endif; ?>

            </form>

            <!-- User Reservations -->
            <h3>Your Reservations</h3>
            <?php if (count($reservations) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Plan ID</th>
                            <th>Guests</th>
                            <th>Booking Date</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation): ?>
                            <tr>
                                <td><?= htmlspecialchars($reservation['Booking_ID']); ?></td>
                                <td><?= htmlspecialchars($reservation['Plan_ID']); ?></td>
                                <td><?= htmlspecialchars($reservation['Number_of_guest']); ?></td>
                                <td><?= htmlspecialchars($reservation['Booking_date']); ?></td>
                                <td><?= htmlspecialchars($reservation['Total_price']); ?></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="booking_id" value="<?= htmlspecialchars($reservation['Booking_ID']); ?>">
                                        <button type="submit" name="delete_reservation" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No reservations found.</p>
            <?php endif; ?>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const planSelect = document.getElementById("plan_id");
            const numGuestsInput = document.getElementById("num_guests");
            const totalPriceInput = document.getElementById("total_price");

            // Function to calculate total price
            function calculatePrice() {
                const selectedOption = planSelect.options[planSelect.selectedIndex]; // Get the selected option
                const planPrice = parseInt(selectedOption.getAttribute('data-price')); // Get the data-price attribute
                const numGuests = parseInt(numGuestsInput.value) || 0; // Default to 0 if NaN
                totalPriceInput.value = planPrice * numGuests; // Simple multiplication
            }

            // Attach event listeners to update the price when plan or guest number changes
            planSelect.addEventListener("change", calculatePrice);
            numGuestsInput.addEventListener("input", calculatePrice);
        });
    </script>

</body>

</html>