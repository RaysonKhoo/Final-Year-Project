<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('auth_page/images/icons/UMS.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('auth_page/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="{{ route('password.email') }}" class="login100-form validate-form" method="POST">
                    @csrf
					<span class="login100-form-title p-b-43">
						Forgot Your Password?
					</span>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('status'))
                                    <div class="alert alert-success alert-dimissible fade show">
                                        {{ Session::get('status') }}
                                    </div>
                @endif
                    <div class="wrap-input100" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">
                    Reset Password
                </button>
            </div>
            <br>
            <div class="text-center">
                <a href="{{ route('register') }}" class="text-primary">Create an Account!</a>
            </div>
            <div class="text-center">
                <a href="{{ route('auth') }}" class="text-primary">Already have an account? Login!</a>
            </div>
        </form>
        <div class="login100-more" style="background-image: url('{{ asset('auth_page/images/bg-02.jpg') }}');">
        </div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="{{ asset('auth_page/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth_page/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth_page/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('auth_page/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth_page/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth_page/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('auth_page/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth_page/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth_page/js/main.js') }}"></script>

</body>
</html>

