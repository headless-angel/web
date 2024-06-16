<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/dashboard_styles.css">
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <div class="profile-dropdown">
            <a class="btn btn-link dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/images/man.png" alt="Profile Image" class="img"> 
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('password.reset.form') }}">Password Reset</a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        
        <div class="container mt-5">
            <h2>Upload Excel File</h2>
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="sample_excel_sheet" class="form-label">Excel File</label>
                    <input type="file" class="form-control" id="sample_excel_sheet" name="sample_excel_sheet" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>

        <div class="container mt-5">
            <h2>Database Records</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Scheme Code</th>
                        <th>Scheme Name</th>
                        <th>Central State Scheme</th>
                        <th>Financial Year</th>
                        <th>State Disbursement</th>
                        <th>Central Disbursement</th>
                        <th>Total Disbursement</th>
                    </tr>
                </thead>
                <tbody>
                    @if($schemes->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Data table is empty</td>
                        </tr>
                    @else
                        @foreach($schemes as $scheme)
                            <tr>
                                <td>{{ $scheme->id }}</td>
                                <td>{{ $scheme->scheme_code }}</td>
                                <td>{{ $scheme->scheme_name }}</td>
                                <td>{{ $scheme->central_state_scheme }}</td>
                                <td>{{ $scheme->financial_year }}</td>
                                <td>{{ $scheme->state_disbursement }}</td>
                                <td>{{ $scheme->central_disbursement }}</td>
                                <td>{{ $scheme->total_disbursement }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
