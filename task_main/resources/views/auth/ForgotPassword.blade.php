<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Forgot Password</h1>
        @if(session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{route('submitForgot')}}" method="post">
            @csrf <!-- Include CSRF token for security -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
                @error('email')
                 <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
