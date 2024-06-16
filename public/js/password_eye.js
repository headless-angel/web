document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');

    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        if (type === 'password') {
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        } else {
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        }
    });

    const passwordConfirmationInput = document.getElementById('password_confirmation');
    const togglePasswordConfirmationButton = document.getElementById('togglePasswordConfirmation');
    const togglePasswordConfirmationIcon = document.getElementById('togglePasswordConfirmationIcon');

    togglePasswordConfirmationButton.addEventListener('click', function() {
        const type = passwordConfirmationInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmationInput.setAttribute('type', type);
        
        if (type === 'password') {
            togglePasswordConfirmationIcon.classList.remove('fa-eye-slash');
            togglePasswordConfirmationIcon.classList.add('fa-eye');
        } else {
            togglePasswordConfirmationIcon.classList.remove('fa-eye');
            togglePasswordConfirmationIcon.classList.add('fa-eye-slash');
        }
    });
});
