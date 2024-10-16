<?php
session_start(); // Start the session
require('db.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch current user details
$sql = "SELECT * FROM User WHERE User_name = '" . $_SESSION['username'] . "'";
$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Assigning user details
    $User_name = $row['User_name'];
    $First_name = $row['First_Name'];
    $Last_name = $row['Last_Name'];
    $Email = $row['Email'];
    $_SESSION['mail'] = $Email;
    $phone_number = $row['phoneNumber'];
    $registration_date = $row['Registration_Date'];
    $date_of_birth = $row['Date_of_Birth'];
} else {
    echo "User not found.";
    exit();
}

// Process form submission for updates
if (isset($_POST['submit'])) {
    // New details from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $pwd = $_POST['password'];

    if (password_verify($pwd, $row['Password'])) {
        $update = "UPDATE User SET First_Name = '$first_name', 
                                        Last_Name = '$last_name'
                                        WHERE User_name = '" . $_SESSION['username'] . "'";

        // Update the database
        if ($con->query($update)) {
            echo "<script>alert('Profile updated successfully!');</script>";
        } else {
            echo "<script>alert('Failed to update profile');</script>";
        }
    } else {
        echo "<script>alert('Incorrect password');</script>";
    }
}

if (isset($_POST['delete-user'])) {
    // Retrieve the password entered for deletion
    $delete_pwd = $_POST['delete-pwd'];

    // Verify the password before allowing the user to delete the account
    if (password_verify($delete_pwd, $row['Password'])) {
        // Deleting the user
        $del_sql = "DELETE FROM User WHERE User_name = '" . $_SESSION['username'] . "'";
        if ($con->query($del_sql) === TRUE) {
            session_destroy(); // End session after account deletion
            echo "<script>alert('Account deleted successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Failed to delete account');</script>";
        }
    } else {
        echo "<script>alert('Incorrect password');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/profile.css">
</head>

<body>
    <header>
        <nav class="navigation">
            <a href="home.php">Home</a>
            <a href="booking.php">Book</a>
            <a href="AboutUs.php">About Us</a>
            <a href="contact.php">contact us</a>
            <button id="profile">Profile</button>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="Pcontainer" id="profileContainer">
        <div class="profile-details">
            <span id="profile-closer">✖️</span>
        </div>

        <div class="profile-info">
            <h2>Your Information</h2>
            <h1 id="full_name"><?= htmlspecialchars($User_name) ?></h1>
            <p><strong>Email:</strong> <span id="email"><?= htmlspecialchars($Email) ?></span></p>
            <p><strong>Phone:</strong> <span id="phone"><?= htmlspecialchars($phone_number) ?></span></p>
            <p><strong>Date of birth:</strong> <span id="dob"><?= htmlspecialchars($date_of_birth) ?></span></p>
            <p><strong>Registration Date:</strong> <span id="registration_date"><?= htmlspecialchars($registration_date) ?></span></p>

            <button type="button" id="edit">Edit</button>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <label for="delete-pwd">Enter password to delete account:</label>
                <input type="text" name="delete-pwd" >
                <button type="submit" name="delete-user" style="padding: 5px;
                                                            background-color:red;
                                                            color:antiquewhite">delete</button>
            </form>

            <div class="edit-profile" id="edit-profile">
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="edit-form">
                    <br><label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($First_name) ?>" required>

                    <br><label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($Last_name) ?>" required>

                    <br><label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($Email) ?>" readonly>

                    <br><label for="phone_number">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" value="<?= htmlspecialchars($phone_number) ?>" readonly>

                    <br><label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <input type="submit" value="Save Changes" name="submit" id="submit">
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/header.js" defer></script>
    <script src="scripts/profile.js" defer></script>
</body>

</html>