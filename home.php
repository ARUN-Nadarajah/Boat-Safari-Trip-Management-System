<?php
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
    <title>Boat Safari</title>
    <link rel="stylesheet" href="styles/home.css">
    <script src="scripts/home.js" defer></script>
</head>

<body>
    <div class="container">
        <center>
            <div class="pics">
                <img src="images/Designer.jpeg" alt="error" id="slider">
            </div>
        </center>

        <div class="wrapper">
            <center>
                <h2>Packages</h2>
            </center>
            <div class="aligner">
                <div class="box">
                    <h3>morning</h3>
                    <div class="pack-pic">
                        <a href="pakages.php"><img src="images/mrng.jpeg" alt=""></a>
                    </div>
                </div>
                <div class="box">
                    <h3>afternoon</h3>
                    <div class="pack-pic">
                        <a href="pakages.php"><img src="images/noon.jpeg" alt=""></a>
                    </div>
                </div>
                <div class="box">
                    <h3>evening</h3>
                    <div class="pack-pic">
                        <a href="pakages.php"><img src="images/evng.jpeg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <h2>Services</h2>
            <div class="aligner">
                <div class="box">
                    <div class="pack-pic">
                        <img src="images/service.jpeg" alt="" style="height: 300px;">
                    </div>
                </div>
                <div class="box serve">
                    <div class="category">
                        <p>Food</p>
                        Enjoy a delightful selection of local and international cuisine, served onboard to enhance your boat safari experience with fresh, flavorful meals tailored to your preferences.
                    </div>
                    <div class="category">
                        <p>Beverages</p>
                        “Savour a refreshing assortment of beverages, from fresh juices and smoothies to premium teas, coffees, and exotic cocktails, perfect for sipping as you soak in the scenic beauty of your boat safari.
                    </div>
                </div>
                <div class="box">
                    <h3>camping</h3>
                    <div class="pack-pic">
                        <img src="images/camping.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include('assets/footer.html');
?>