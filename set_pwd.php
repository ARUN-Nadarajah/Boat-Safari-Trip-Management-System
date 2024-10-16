<?php 
session_start();
require('db.php');

if (!isset($_SESSION['email'])) {
    header("Location: pwd_reset.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Reset Password</h2>
            <form action="resetpwd.php" method="POST" onsubmit="return validatePassword();">
                <div class="input-box">
                    <label for="password">Enter the new password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="input-box">
                    <label for="repassword">Re-enter the new password:</label>
                    <input type="password" id="repassword" name="repassword" required>
                </div>

                <div class="button-box">
                    <input type="submit" value="Update" name="change">
                </div>
            </form>
        </div>
    </div>

    <script>
        function validatePassword() {
            const pwd = document.getElementById('password').value;
            const rePwd = document.getElementById('repassword').value;

            if (pwd !== rePwd) {
                alert('Passwords do not match');
                return false;
            }
            return true;
        }
    </script>

</body>
</html>