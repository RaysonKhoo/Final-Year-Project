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
			<form action="{{ route('auth') }}" class="login100-form validate-form" method="POST">
                    @csrf
                    <a href="/" class="btn btn-sm btn-primary">Back</a>
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
                    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            @endif

            @if (Session::get('success'))
            <div class="alert alert-success alert-dimissible fade show">
                <ul>
                    <li>{{ Session::get('success') }}</li>
                </ul>
            </div>
            @endif
            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input100" type="text" name="email">
                <span class="focus-input100"></span>
                <span class="label-input100">Email</span>
            </div>


            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="password">
                <span class="focus-input100"></span>
                <span class="label-input100">Password</span>
            </div>

            <div class="flex-sb-m w-full p-t-3 p-b-32">
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="remember" type="checkbox" name="remember">
                    <label class="label-checkbox100" for="remember">
                        Remember me
                    </label>
                </div>

                <div>
                    <a href="{{ route('password.request') }}" class="txt1">
                        Forgot Password?
                    </a>
                </div>
            </div>


            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">
                    Login
                </button>
            </div>

            <div class="text-center p-t-46 p-b-20">
                <span class="txt2">
                    <a href="{{ route('register') }}" class="text-primary">New User</a>
                </span>
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
