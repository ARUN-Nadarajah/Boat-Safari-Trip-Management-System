document.getElementById('signupForm').addEventListener('submit', function(event) 
{
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        event.preventDefault();
        document.getElementById('error-message').textContent = "Passwords do not match.";
    }
}
);