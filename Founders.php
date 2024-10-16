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
    <title>Founders Page</title>
    <link rel="stylesheet" href="styles/FoundersStyle.css">
</head>

<body>
  <a href="AboutUs.php"><img class="arrow" src="images/left arrow.jpg" alt=""></a>

<h2 class="heading">FOUNDERS</h2>

<div class="gallery">
    <a target="_blank" href="images/image10.jpg">
    <img class="img2" src="images/image10.jpg" alt="display picture" width="600" height="400"></a>
    <div class="desc"><h3>ADSHAYA SATKUNASEELAN</h3>Currently lives in jaffna. Regarding IT undergraduate programme at SLIIT. 
      Currently on year 1 semester 2. Continue to honing my skills in web development and in c++ programming. 
      <br> Interested in working with groups and provide guidance for the teammates.</div>
</div>

<div class="gallery">
    <a target="_blank" href="images/image08.jpg">
    <img class="img3" src="images/image08.jpg" alt="display picture" width="600" height="400"></a>
    <div class="desc"><h3>KENUJA SARWESVARAN</h3>Currently lives in jaffna. Regarding IT undergraduate programme at SLIIT. 
      Currently on year 1 semester 2. Continue to honing my skills in web development and in c++ programming language.
      <br>Interested in talking with peoples and hear their problems and comfort them.</div>
</div>

<div class="gallery">
    <a target="_blank" href="images/image11.jpg">
    <img class="img2" src="images/image11.jpg" alt="display picture" width="600" height="400"></a>
    <div class="desc"><h3>RISHIKESHAN SATHIYENDRAN</h3>Currently lives in jaffna. Regarding IT undergraduate programme at SLIIT. 
      Currently on year 1 semester 2. Continue to honing my skills in web development and in c++ programming language.
      <br>Interested in observing peoples and their activities and help them to make good decisions.</div>
</div>

<div class="gallery">
    <a target="_blank" href="images/image09.jpg">
    <img class="img3" src="images/image09.jpg" alt="display picture" width="600" height="400"></a>
    <div class="desc"><h3>ARUN NADARAJAH</h3>Currently lives in jaffna. Regarding IT undergraduate programme at SLIIT. 
      Currently on year 1 semester 2. Continue to honing my skills in web development and in c++ programming language.
      <br>Passionate about technology and interested in solving real world problems.</div>
</div>

<div class="gallery">
    <a target="_blank" href="images/image12.jpg">
    <img class="img2" src="images/image12.jpg" alt="display picture" width="600" height="400"></a>
    <div class="desc"><h3>KOBITHARSAN THEVAPALAN</h3>Currently lives in jaffna. Regarding IT undergraduate programme at SLIIT. 
      Currently on year 1 semester 2. Continue to honing my skills in web development and in c++ programming language.
      <br>interested in cyber technologies and network security.</div>
</div>

<div class="extras">
  <div class="extras1"><h2>10+</h2><br><p>Your Experience</p></div>
  <div class="extras1"><h2>500+</h2><br><p>Possitive Review</p></div>
  <div class="extras1"><h2>60+</h2><br><p>staffs</p></div>
</div>

<footer>
    <h3>Footer</h3>
</footer>

</body>
</html>


<?php

include('assets/footer.html');

?>