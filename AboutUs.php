<?php
session_start();
include ('db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include('assets/header.php');


?>


<!DOCTYPE html>
<head>

    <link rel="stylesheet" href="styles/AboutUsStyle.css">
    <!-- <link rel="stylesheet" href="styles/AboutUsHeader.css"> -->
</head>

<body>

    <div class="image-con">
        <img class="image" src="images/image04.1.jpg" alt="About Us">
        <div class="text-overlay"><h1 class="about-us">ABOUT US</h1></div>
    </div>

    <br>

    <div class="secondary-images">
        <img class="img" src="images/image01.jpg" alt="pic 1"><h2>Who We Are</h2><p class="para1">Welcome to [Company Name], your premier destination 
            for unforgettable boat safari experiences! We are passionate adventurers, nature enthusiasts, and experienced guides committed 
            to bringing you the thrill of exploring majestic waterways, pristine landscapes, and wildlife in their natural habitats.
            <br>Founded in [Year], [Company Name] was born out of a deep love for nature and adventure. With decades of collective experience 
            in tourism, wildlife conservation, and hospitality, our team is dedicated to creating unique, eco-friendly, and immersive safari 
            trips that cater to both thrill-seekers and nature lovers.
    </p>
    </div>

    <div class="secondary-images"> 
        <img class="img1" src="images/image02.jpg" alt="pic 2"><h2>Our Mission</h2><p class="para2">Our mission is simple – to offer the best boat safari 
            experiences that allow our guests to explore the beauty of the natural world while promoting environmental sustainability and 
            respect for local wildlife. We believe in responsible tourism, ensuring that our safaris leave a minimal footprint and contribute 
            positively to the ecosystems and communities we operate in.
        </p>
    </div>

    <div class="secondary-images">
        <img class="img" src="images/image03.jpg" alt="pic 3"><h2>What We Offer</h2><p class="para1">At [Company Name], we specialize in tailor-made boat 
            safaris that traverse some of the most breathtaking rivers, lakes, and coastal regions. Whether you're looking to observe majestic 
            elephants quenching their thirst, track elusive leopards on the banks of rivers, or witness breathtaking sunsets over tranquil 
            waters, we have the perfect adventure for you. Our trips range from day excursions to multi-day safaris with luxurious onboard 
            accommodations.
        </p>
    </div>

    <div class="secondary-images"> 
        <img class="img1" src="images/image05.jpg" alt="pic 2"><h2>Join Us</h2><p class="para2">Come aboard and embark on an adventure of a lifetime! 
            Whether you're a seasoned traveler or a first-time adventurer, [Company Name] offers the perfect blend of excitement, relaxation, 
            and discovery. Let us guide you through the heart of nature, where every journey is a story waiting to be told. Feel free to 
            customize this template with specific details about your company, such as the regions you operate in, the unique wildlife you 
            encounter, and any special offers or experiences you provide.
        </p>
    </div>

    <hr>

    <footer>
        <h3><a class="footer" href="Founders.php">Founders</a></h3>
    </footer>

</body>
</html>

<?php

include('assets/footer.html');

?>