<?php
session_start();
require('db.php');
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE User_name = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: home.php");
        } else {
            echo "<script>alert('invalid_password');</script>";       
        }
    } else {
        echo "<script>alert('invalid_username');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <div class="container">

        <div class="welcome">
            <center>
                <h1>
                    Welcome back
                </h1>
            </center>
        </div>

        <div class="form1">
            <form class="design" action="login.php" method="post">
                <h2>
                    <center>LOGIN</center>
                </h2>
                <div class="input-box">
                    <label>User Name</label><br>
                    <input type="textbox" name="username"><br><br>
                </div>

                <div class="input-box">
                    <label>Password</label><br>
                    <input type="Password" name="password"><br><br>
                </div>
                <br>
                <!-- <?php
                // if (!empty($error_message)) {
                //     echo '<div id="error-message">' . $error_message . '</div>';
                // }
                ?> -->
                <input type="submit" value="login" name="login" id="submit">

                <div class="actions">
                    <a href="pwd_reset.php">Forgot Password</a>
                    <a href="register.php">Register</a>
                </div>

                <a href="staff_login.php">STAFF</a>
                
                <br><br>
            </form>
        </div>

        
    </div>
</body>

</html>