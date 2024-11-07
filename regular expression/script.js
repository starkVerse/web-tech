document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    validateForm();
});

function validateForm() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    let isValid = true;

    
    const usernameRegex = /^[a-zA-Z]+ [a-zA-Z]+$/;
    if (!usernameRegex.test(username)) {
        isValid = false;
        document.getElementById('usernameError').innerText = 'username must contain first and last name, only letters and a space.';
        document.getElementById('usernameError').style.display = 'block';
    } else {
        document.getElementById('usernameError').style.display = 'none';
    }

    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        isValid = false;
        document.getElementById('emailError').innerText = 'Please enter a valid email address.';
        document.getElementById('emailError').style.display = 'block';
    } else {
        document.getElementById('emailError').style.display = 'none';
    }

   
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (!passwordRegex.test(password)) {
        isValid = false;
        document.getElementById('passwordError').innerText = 'Password must be at least 8 characters long and contain at least one letter and one number.';
        document.getElementById('passwordError').style.display = 'block';
    } else {
        document.getElementById('passwordError').style.display = 'none';
    }

    if (isValid) {
        alert('Form submitted successfully!');
    }
}
