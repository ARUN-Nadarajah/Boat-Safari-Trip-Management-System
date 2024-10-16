<?php
require('db.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registration</title>
    <link rel="stylesheet" href="styles/register.css">
</head>

<body>
    <div class="container">
        <div class="login-register-box">
            <h2>Register</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="form">
                <div class="input-box">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-box">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="input-box">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>

                <div class="input-box">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>

                <div class="input-box">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-box">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" required>
                </div>

                <div class="input-box">
                    <label for="reg_date">Registration Date:</label>
                    <input type="date" id="reg_date" name="reg_date" value="<?= date('Y-m-d'); ?>" readonly>
                </div>

                <div class="input-box">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" max="<?= date('Y-m-d') ?>" required>
                </div>

                <div class="input-box">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" readonly>
                </div>


                <div class="button-box">
                    <input type="submit" value="Register" name="register" id="submit">
                </div>

                <div class="login">
                    <a href="login.php">already have an account</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Automatically calculate age when the date of birth is selected
        document.getElementById('dob').addEventListener('change', function() {
            var dob = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        });
            
       
    </script>

    <script src="scripts/validation.js"></script>
</body>

</html>


<?php

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM user WHERE User_name = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('user name is not available')</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $registration_date = date('Y-m-d');
    $date_of_birth = $_POST['dob'];
    $age = $_POST['age'];
    $active_status = 1;

    


    $sql = "INSERT INTO user (User_name, Password, First_Name, Last_Name, Email,phoneNumber, Registration_Date, Date_of_Birth, Age, Active_Status) 
                VALUES ('$username', '$password_hashed', '$first_name', '$last_name', '$email','$phonenumber', '$registration_date', '$date_of_birth', '$age', '$active_status')";

    // if (0) {
    if ($con->query($sql)) {
        header('Location: login.php');
    } else {
        // Show error if something goes wrong
        echo "  <script>alert('Error: " . $con->error . "  ');</script>    ";
    }
}

?>