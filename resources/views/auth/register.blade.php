<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign up</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap Styles / Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        .login-card {
            border: none;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
    </style>
</head>

<body>
    <div class="container-fluid min-vh-100 bg-dark text-white d-flex align-items-center justify-content-center ">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card login-card " style="min-height: 50dvh !important;">
                    <div class="card-body">
                        <p class="mt-2 fw-bold fs-3 text-center"><i>Welcome to Instagram Clone</i></p>
                        <div class="px-3">
                            <form method="post" action="{{ route('register-user') }}">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-6 mt-3 mt-md-0">
                                                <input type="text" name="first_name" id="first_name"
                                                    placeholder="First Name" class="form-control shadow-none">
                                            </div>
                                            <div class="col-md-6 mt-3 mt-md-0">
                                                <input type="text" name="last_name" id="last_name"
                                                    placeholder="Last Name" class="form-control shadow-none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <input type="text" name="username" id="username"
                                            placeholder="User Name (user123)" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <input type="email" name="email" id="email" placeholder="Email"
                                            class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" placeholder="Password"
                                                class="form-control shadow-none">
                                            <div class="input-group-text" style="cursor: pointer;">
                                                <span id="togglePassword">
                                                    <i class="bi bi-eye-fill d-none"></i>
                                                    <i class="bi bi-eye-slash-fill"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                    <div class="col-md-12 mt-4">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Sign up
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-12 mt-3">
                                    <p class="text-center">
                                        Have an account?
                                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <!-- Password Hide and Show -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const eyeOpen = togglePassword.querySelector('.bi-eye-fill');
            const eyeSlash = togglePassword.querySelector('.bi-eye-slash-fill');

            togglePassword.addEventListener('click', () => {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';

                eyeOpen.classList.toggle('d-none', !isPassword);
                eyeSlash.classList.toggle('d-none', isPassword);
            });
        });
    </script>

</body>

</html>