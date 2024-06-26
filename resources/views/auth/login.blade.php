<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .card {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .form-section,
        .image-section {
            flex: 1;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
            background: #fff;
        }

        .form-section h1 {
            margin-bottom: 10px;
        }

        .form-section p {
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group .error {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .forgot-password {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .form-btn {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-btn:hover {
            background: #45a049;
        }

        .toggle-link {
            margin-top: 20px;
            text-align: center;
        }

        .toggle-link a {
            color: #007bff;
            text-decoration: none;
        }

        .toggle-link a:hover {
            text-decoration: underline;
        }

        .image-section {
            display: none;
        }

        @media (min-width: 768px) {
            .image-section {
                display: block;
                background: url('/assets/images/backgrounds/sample1.jpg') no-repeat center center;
                background-size: cover;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card animate__animated">
            <div class="form-section col-12 col-md-6">
                <!-- Login Form -->
                <div id="login-form" class="animate__animated animate__fadeIn">
                    <h1>Selamat Datang!</h1>
                    <p>Silahkan masuk jika sudah memiliki account</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password">
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="actions">
                            <a href="{{ route('password.request') }}" class="forgot-password">forgot password</a>
                        </div>
                        <button type="submit" class="form-btn">Login</button>
                    </form>
                    <div class="toggle-link">
                        <p>Don't have an account? <a href="#" id="show-register">Sign Up</a></p>
                    </div>
                </div>
                <!-- Register Form -->
                <div id="register-form" class="animate__animated" style="display: none;">
                    <h1>Register</h1>
                    <p>Silahkan daftar untuk membuat account baru</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name -->
                        <div class="input-group">
                            <label for="register-name">Name</label>
                            <input type="text" id="register-name" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autofocus autocomplete="name">
                            @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <!-- Email Address -->
                        <div class="input-group">
                            <label for="register-email">Email address</label>
                            <input type="email" id="register-email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="username">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <!-- Password -->
                        <div class="input-group">
                            <label for="register-password">Password</label>
                            <input type="password" id="register-password" name="password" placeholder="Enter your password" required autocomplete="new-password">
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <!-- Confirm Password -->
                        <div class="input-group">
                            <label for="register-password-confirm">Confirm Password</label>
                            <input type="password" id="register-password-confirm" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
                            @if ($errors->has('password_confirmation'))
                                <span class="error">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="form-btn">Register</button>
                    </form>
                    <div class="toggle-link">
                        <p>Already have an account? <a href="#" id="show-login">Login</a></p>
                    </div>
                </div>
            </div>
            <div class="image-section col-12 col-md-6">
                <!-- Image will be displayed only on tablets and larger screens -->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('show-register').addEventListener('click', function (e) {
            e.preventDefault();
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');

            loginForm.classList.remove('animate__fadeIn');
            loginForm.classList.add('animate__fadeOut');
            setTimeout(function() {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                registerForm.classList.remove('animate__fadeOut');
                registerForm.classList.add('animate__fadeIn');
            }, 500);
        });

        document.getElementById('show-login').addEventListener('click', function (e) {
            e.preventDefault();
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');

            registerForm.classList.remove('animate__fadeIn');
            registerForm.classList.add('animate__fadeOut');
            setTimeout(function() {
                registerForm.style.display = 'none';
                loginForm.style.display = 'block';
                loginForm.classList.remove('animate__fadeOut');
                loginForm.classList.add('animate__fadeIn');
            }, 500);
        });
    </script>
     <!-- SweetAlert2 CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
     <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

     <!-- Display SweetAlert2 notifications -->
     <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showConfirmButton: true,
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                showConfirmButton: true,
            });
        @endif
    </script>
</body>

</html>
