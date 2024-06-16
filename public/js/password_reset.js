document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('password-reset-form');
    const oldPasswordInput = document.getElementById('old_password');
    const newPasswordInput = document.getElementById('new_password');
    const confirmPasswordInput = document.getElementById('new_password_confirmation');
    const oldPasswordError = document.getElementById('old-password-error');
    const newPasswordError = document.getElementById('new-password-error');
    const confirmPasswordError = document.getElementById('confirm-password-error');

    form.addEventListener('submit', function(event) {
        oldPasswordError.textContent = '';
        newPasswordError.textContent = '';
        confirmPasswordError.textContent = '';

        let isValid = true;

        if (oldPasswordInput.value === '') {
            oldPasswordError.textContent = 'Old password is required';
            oldPasswordInput.classList.add('is-invalid');
            isValid = false;
        } else {
            oldPasswordInput.classList.remove('is-invalid');
        }

        if (newPasswordInput.value.length < 6) {
            newPasswordError.textContent = 'New password must be at least 6 characters long';
            newPasswordInput.classList.add('is-invalid');
            isValid = false;
        } else {
            newPasswordInput.classList.remove('is-invalid');
        }

        if (newPasswordInput.value !== confirmPasswordInput.value) {
            confirmPasswordError.textContent = 'Passwords do not match';
            confirmPasswordInput.classList.add('is-invalid');
            isValid = false;
        } else {
            confirmPasswordInput.classList.remove('is-invalid');
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
