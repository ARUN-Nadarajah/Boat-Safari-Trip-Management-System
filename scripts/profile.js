let edit = document.getElementById('edit');
let edit_form = document.getElementById('edit-profile');

const numInput = document.getElementById('phone_number');
const mail = document.getElementById('email');
const submit = document.getElementById('submit');

numInput.addEventListener('input', validateNumberInputs);
mail.addEventListener('change', validateEmail);
submit.addEventListener('click', finalValidation);

edit.addEventListener('click', () => {
    if (edit_form.style.display === 'block') {
        edit_form.style.display = 'none';
    } else {
        edit_form.style.display = 'block';
    }
});

function validateNumberInputs(event) {
    const input = event.target;
    const value = input.value;

    // Remove any non-digit characters
    input.value = value.replace(/\D/g, '');
}

function validateEmail() {
    const mailValue = mail.value;
    
    // Regular expression for validating email format
    const regex = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})$/;
    
    if (regex.test(mailValue)) {
        return true; // Email is valid
    } else {
        alert("Invalid email format");
        return false; // Email is invalid
    }
}

function finalValidation(event){
    const age = document.getElementById('age').value;
    const phoneNumber = numInput.value;

    // Validate phone number length
    if (phoneNumber.length !== 10) {
        event.preventDefault();
        alert("Phone number should be exactly 10 digits.");
        return; // Exit the function to prevent form submission
    }

    // Validate age
    if (age < 16){
        event.preventDefault();
        alert("You must be 16 years or older to register.");
        return; // Exit the function to prevent form submission
    }

    // Validate email
    if (!validateEmail()) {
        event.preventDefault(); // Prevent form submission if email is invalid
        return; // Exit the function to prevent form submission
    }

    // Submit the form if all validations pass
    edit_form.submit();
}