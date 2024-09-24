<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
    <style>
        body {
            background-size: cover;
            position: relative;
        }

        .blur-background::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            z-index: 1;
        }

        .custom-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-container {
            position: relative;
            z-index: 2;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
        }

        .card-title {
            color: black;
        }

        .input-group-text {
            background-color: black;
            color: #ffffff;
        }

        .input-group-text i {
            color: #ffffff;
        }

        .btn-primary {
            background-color: black;
            border-color: black;
        }

        .btn-primary:hover {
            background-color: #616060;
            border-color: #616060;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-success .alert-link {
            color: #0c6c44;
        }

        .back {
            background: black;
            margin-right: 220px;
            text-align: center;
            border-radius: 7px
        }

        .back a {
            color: #ffffff
        }
    </style>
</head>

<body class="blur-background">
    <div class="d-flex align-items-center justify-content-center vh-100 card-container">
        <div class="card p-4 custom-shadow" style="width: 22rem;">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="back">
                <a href="{{ route('home') }}" class="text-decoration-none">Kembali</a>
            </div>
            <h4 class="card-title text-center mb-4">Login</h4>
            <form action="{{ route('login') }}" method="post">

                @csrf
                <div class="mb-3">
                    <label for="login" class="form-label">Nama Atau Email</label>
                    <div class="input-group">
                        <input type="text" name="login" id="login" class="form-control"
                            placeholder="Masukkan nama atau email" value="{{ old('login') }}" required>
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukkan password" value="{{ old('password') }}" required>
                        <span class="input-group-text" id="togglePassword">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-sign-in-alt"></i> Login</button>
            </form>
            <div class="mt-3 text-center">
                Belum Punya Akun? <a href="{{ route('register_form') }}" class="text-decoration-none">register</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/newFile.js') }}"></script>
</body>

</html>
