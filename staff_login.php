<?php
require('db.php');

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
                    Staff Login
                </h1>
            </center>
        </div>

        <div class="form1">
            <form class="design" action="admin dashboard/login.php" method="post">
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

                <a href="login.php">User</a>
                
                <br><br>
            </form>
        </div>

        
    </div>
</body>

</html>