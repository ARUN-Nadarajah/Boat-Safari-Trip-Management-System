<?php 

    require('db.php');
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM user WHERE User_name = '$username'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            // If username exists, check password
            $row = $result->fetch_assoc();
            if ($row['Email'] == $email) {
                session_start();
                $_SESSION['email'] = $email;
                header("location: set_pwd.php");
                exit();
            } else {
                // Password is incorrect, display error message
                echo "<script>alert('invalid email');</script>";       
            }
        } else {
            // Username does not exist, display error message
            echo "Invalid username";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <span id="back"><a href="/prac/login.php">←</a></span>
            <h2>reset password</h2>
            <form action="pwd_reset.php" method="POST">
                <div class="input-box">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-box">
                    <label for="email">email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="button-box">
                    <input type="submit" value="submit">
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>