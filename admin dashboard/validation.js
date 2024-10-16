const numInput = document.getElementById('phone_number');
const mail = document.getElementById('email');
const submit = document.getElementById('submit');


numInput.addEventListener('input', validateNumberInputs);
mail.addEventListener('change', validateEmail);
submit.addEventListener('click', finalValidation);



function validateNumberInputs(event) {
    const input = event.target;
    const value = input.value;

    // Remove any non-digit characters
    input.value = value.replace(/\D/g, '');

}

function validateEmail(event) {
    const mailValue = mail.value;
    
    const regex = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})$/;
    
    if (regex.test(mailValue)) {
        return true;
    } else {
        alert("Invalid email");
        return false;
    }
}

function finalValidation(event){
    const age = document.getElementById('age').value;
    const phoneNumber = numInput.value;

    if (phoneNumber.length != 10) {
        event.preventDefault();
        alert("Phone number should not exceed 10 digits");
        // input.value = input.value.slice(0, 10); // Limit to 10 digits
    }

    if(age < 16){
        event.preventDefault();
        alert("You must be 16 years or older to register.");
    }


    if(!validateEmail()){
        alert("plese check the email adress again")
    }

    document.querySelector('registration-form').submit();
}