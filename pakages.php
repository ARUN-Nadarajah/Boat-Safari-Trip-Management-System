<?php
session_start();
include("db.php");
include('assets/header.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boat Safari Packages</title>
    <link rel="stylesheet" href="styles/packages.css">
</head>

<body>
    <div class="container">
        <h1>Explore Our Boat Safari Packages</h1>

        <div class="packages">
            <!-- Morning Package -->
            <div class="package">
                <div class="package-header">
                    <h2>Morning Safari</h2>
                    <div class="price">Rs. 30,000</div>
                </div>
                <img src="images/mrng.jpeg" alt="Morning Safari">
                <p><strong>Time:</strong> 6:00 AM - 10:00 AM</p>
                <p>Start your day with the peaceful beauty of the river as the sun rises. This package offers early access to prime wildlife viewing, as animals are most active in the morning.</p>
                <p><strong>Includes:</strong> Bird-watching opportunities & Wildlife spotting (hippos, elephants, crocodiles)</p>
                <p><strong>Perks:</strong> Perfect for bird enthusiasts & Early access to unspoiled nature</p>
                <a href="booking.php"> <button type="button">BOOK</button></a>

            </div>

            <!-- Afternoon Package -->
            <div class="package">
                <div class="package-header">
                    <h2>Afternoon Safari</h2>
                    <div class="price">Rs. 15,000</div>
                </div>
                <img src="images/noon.jpeg" alt="Afternoon Safari">
                <p><strong>Time:</strong> 12:00 PM - 4:00 PM</p>
                <p>Spend your afternoon cruising through the beautiful waterways, with the sun high in the sky. This safari is ideal for adventure seekers to take part in optional activities like fishing or swimming in safe areas.</p>
                <p><strong>Includes:</strong> Guided wildlife safari on the river & Opportunities for fishing</p>
                <p><strong>Perks:</strong> Great for families and adventurers & A balance of relaxation and action</p>
                <a href="booking.php"> <button type="button">BOOK</button></a>


            </div>

            <!-- Evening Package -->
            <div class="package">
                <div class="package-header">
                    <h2>Evening Safari</h2>
                    <div class="price">Rs. 25,000</div>
                </div>
                <img src="images/evng.jpeg" alt="Evening Safari">
                <p><strong>Time:</strong> 5:00 PM - 8:00 PM</p>
                <p>Experience the magic of the sunset while floating along the river, with a stunning backdrop of wilderness. You can enjoy a sundowner while watching animals come to the water for their final drink of the day.</p>
                <p><strong>Includes:</strong> Sunset boat cruise with wildlife viewing & Return to camp under the stars</p>
                <p><strong>Perks:</strong> Romantic and peaceful & Ideal for photography enthusiasts</p>
                <a href="booking.php"> <button type="button">BOOK</button></a>

            </div>
        </div>
    </div>
</body>

</html>

<?php
include('assets/footer.html');
?>