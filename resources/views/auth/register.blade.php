<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h2 class="text-center mb-4">Register</h2>
            @if ($emailExists ?? false)
                <div class="alert alert-danger" role="alert">
                    A user with this email address already exists.
                </div>
            @endif
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <span id="nameError" class="error-message"></span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <span id="emailError" class="error-message"></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-muted">(min 6 characters)</span></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span id="passwordError" class="error-message"></span>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    <span id="passwordConfirmationError" class="error-message"></span>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="mt-3 text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <script>
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
                    isValid = false;
                } else {
                    nameError.textContent = '';
                }

                if (!emailInput.value.trim()) {
                    emailError.textContent = 'Email address is required';
                    isValid = false;
                } else if (!emailRegex.test(emailInput.value.trim())) {
                    emailError.textContent = 'Invalid email format';
                    isValid = false;
                } else {
                    emailError.textContent = '';
                }

                if (!passwordInput.value.trim()) {
                    passwordError.textContent = 'Password is required';
                    isValid = false;
                } else if (passwordInput.value.length < 6) {
                    passwordError.textContent = 'Password must be at least 6 characters';
                    isValid = false;
                } else {
                    passwordError.textContent = '';
                }

                if (passwordInput.value !== passwordConfirmationInput.value) {
                    passwordConfirmationError.textContent = 'Passwords do not match';
                    isValid = false;
                } else {
                    passwordConfirmationError.textContent = '';
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
