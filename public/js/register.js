document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const passwordConfirmationInput = document.getElementById('password_confirmation');
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const passwordConfirmationError = document.getElementById('passwordConfirmationError');

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    registerForm.addEventListener('submit', function(event) {
        let isValid = true;

        if (!nameInput.value.trim()) {
            nameError.textContent = 'Name is required';
            nameInput.classList.add('is-invalid');
            isValid = false;
        } else {
            nameError.textContent = '';
            nameInput.classList.remove('is-invalid');
        }

        if (!emailInput.value.trim()) {
            emailError.textContent = 'Email address is required';
            emailInput.classList.add('is-invalid');
            isValid = false;
        } else if (!emailRegex.test(emailInput.value.trim())) {
            emailError.textContent = 'Invalid email format';
            emailInput.classList.add('is-invalid');
            isValid = false;
        } else {
            emailError.textContent = '';
            emailInput.classList.remove('is-invalid');
        }

        if (!passwordInput.value.trim()) {
            passwordError.textContent = 'Password is required';
            passwordInput.classList.add('is-invalid');
            isValid = false;
        } else if (passwordInput.value.length < 6) {
            passwordError.textContent = 'Password must be at least 6 characters';
            passwordInput.classList.add('is-invalid');
            isValid = false;
        } else {
            passwordError.textContent = '';
            passwordInput.classList.remove('is-invalid');
        }

        if (passwordInput.value !== passwordConfirmationInput.value) {
            passwordConfirmationError.textContent = 'Passwords do not match';
            passwordConfirmationInput.classList.add('is-invalid');
            isValid = false;
        } else {
            passwordConfirmationError.textContent = '';
            passwordConfirmationInput.classList.remove('is-invalid');
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
