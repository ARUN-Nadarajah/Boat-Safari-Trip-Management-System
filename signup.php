<?php
require('db.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM user WHERE User_name = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('user name is not available)</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $registration_date = date('Y-m-d');
    $date_of_birth = $_POST['dob'];
    $age = $_POST['age'];
    $active_status = 1;



    $sql = "INSERT INTO user (User_name, Password, First_Name, Last_Name, Email, Registration_Date, Date_of_Birth, Age, Active_Status) 
            VALUES ('$username', '$password_hashed', '$first_name', '$last_name', '$email', '$registration_date', '$date_of_birth', '$age', '$active_status')";

    if ($con->query($sql)) {
        header('Location: login.php');
    } else {
        // Show error if something goes wrong
        echo "Error: " . $con->error;
    }
}
$con->close();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>

    <div class="container">
        <div class="login-register-box">
            <h2>Register</h2>
            <form action="register.php" method="POST" id="registration-form">
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
                    <label for="reg_date">Registration Date:</label>
                    <input type="date" id="reg_date" name="reg_date" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>

                <div class="input-box">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="input-box">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" readonly>
                </div>

                <div class="button-box">
                    <input type="submit" value="Register" name="register">
                </div>

                <div class="login">
                    <a href="login.php">already have an account</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>