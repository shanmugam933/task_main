<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    html,body { height: 100%; }

body{
	display: -ms-flexbox;
	display: -webkit-box;
	display: flex;
	-ms-flex-align: center;
	-ms-flex-pack: center;
	-webkit-box-align: center;
	align-items: center;
	-webkit-box-pack: center;
	justify-content: center;
	background-color: #f5f5f5;
}

form{
	padding-top: 10px;
	font-size: 14px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 14px;
	margin-top:20px;
}

.login-form{
	width:320px;
	margin:20px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

span{
	font-size:14px;
}
</style>
<body>
    {{-- <div class="container mt-5">
        <h1 class="mb-4">Reset Password</h1>
        @if(session('errorr'))
            <div class="alert alert-danger">{{ session('errorr') }}</div>
        @endif
        @if(session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif

        <form action="{{route('submitReset',$token)}}" method="post">
            @csrf <!-- Include CSRF token for security -->
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div> --}}
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Set Password</h3>
            @if(session('errorr'))
                <div class="alert alert-danger">{{ session('errorr') }}</div>
            @endif
            @if(session('message'))
                <div class="alert alert-danger">{{ session('message') }}</div>
            @endif

            <div class="card-text">
                <form action="{{route('submitReset',$token)}}" method="post">
                    @csrf <!-- Include CSRF token for security -->
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Create a Secure Password: Protect Your Account with a Strong Password</label>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
