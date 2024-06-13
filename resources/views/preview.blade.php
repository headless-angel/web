<!DOCTYPE html>
<html>
<head>
    <title>Preview Excel File</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Preview Excel File</h2>
        <form action="{{ route('finalizeUpload') }}" method="POST">
            @csrf
            <input type="hidden" name="data" value="{{ json_encode($data) }}">
            <table class="table">
                <thead>
                    <tr>
                        <th>Scheme code</th>
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
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row[0] }}</td>
                        <td>{{ $row[1] }}</td>
                        <td>{{ $row[2] }}</td>
                        <td>{{ $row[3] }}</td>
                        <td>{{ $row[4] }}</td>
                        <td>{{ $row[5] }}</td>
                        <td>{{ $row[6] }}</td>
                        <td>{{ $row[7] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Confirm Upload</button>
        </form>
    </div>
</body>
</html>
