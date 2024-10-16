<?php
session_start();
include('db.php');
error_reporting(E_ALL); 
ini_set('display_errors', 1);

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

// Check if form is submitted
if (isset($_POST['submit']) ){
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

        $username = $_POST['username'];
        $sql = "SELECT * FROM user WHERE User_name = '$username'";
        $result = $pdo->query($sql);
    
    


    $sql = "INSERT INTO user (User_name, Password, First_Name, Last_Name, Email,phoneNumber, Registration_Date, Date_of_Birth, Age, Active_Status) 
                VALUES ('$username', '$password_hashed', '$first_name', '$last_name', '$email','$phonenumber', '$registration_date', '$date_of_birth', '$age', '$active_status')";

    

    if ($pdo->query($sql)) {
        header('Location: manage-users.php');
    } else {
        // Show error if something goes wrong
        echo "  <script>alert('Error: " . $con->error . "  ');</script>    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="common.css">


</head>

<body>

    <center><h1>Add User</h1></center>
    <div class="form-container">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone_number" required><br><br>

        <label for="registration_date">Registration Date:</label>
        <input type="date" name="registration_date" value="<?= date('Y-m-d'); ?>" readonly><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" max="<?= date('Y-m-d') ?>" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" readonly>
        <br><br>


        <button type="submit" id="submit" name="submit">Add User</button>
    </form>
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

<script src="validation.js" defer></script>


    <!-- <script src="../scripts/validation.js"></script> -->
</body>

</html>