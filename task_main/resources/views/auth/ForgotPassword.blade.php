<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
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
        <h1 class="mb-4">Forgot Password</h1>
        @if(session('message'))
         <div class="alert alert-success">{{ session('message') }}</div>
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
    </div> --}}
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Reset password</h3>
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
           @endif
            <div class="card-text">
                <form action="{{route('submitForgot')}}" method="post">
                    @csrf <!-- Include CSRF token for security -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter your email address and we will send you a link to reset your password.</label>
                        <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Enter your email address" required>
                       @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Send password reset email</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
