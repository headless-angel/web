<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h2 class="text-center mb-4">Password Reset</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form id="password-reset-form" method="POST" action="{{ route('password.reset') }}">
                @csrf
                <div class="mb-3">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                    <div class="invalid-feedback" id="old-password-error"></div>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password <span class="text-muted">(min 6 characters)</span></label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                    <div class="invalid-feedback" id="new-password-error"></div>
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                    <div class="invalid-feedback" id="confirm-password-error"></div>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="/js/password_reset.js"></script>
</body>
</html>