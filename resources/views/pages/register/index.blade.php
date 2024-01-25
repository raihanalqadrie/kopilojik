<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }} - Kopilojik</title>

    <!-- Custom fonts for this template-->
    <link href="dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dist/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 150px;">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block text-center"><img src="img/logo-2.png"
                                    style="margin-top: 35px; width: 250px; margin-left: 40px;">
                                <h1 class="h6 text-gray-700 mb-1" style="margin-top: 30px; margin-left: 50px;">Kopilojik
                                </h1>
                                <p class="text-gray-700" style="margin-left: 50px; font-size: 12px">Copyright &copy;
                                    Muhammad Raihan Alqadrie 2024</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Registrasi</h1>
                                    </div>
                                    <form class="user" action="/register" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name"
                                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                                id="name" placeholder="Username..." required
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="password"
                                                placeholder="Password..." required>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block"
                                            type="submit">Register</button>
                                    </form>
                                    <small class="d-block text-center mt-3">Sudah Registrasi ? <a
                                            style="text-decoration: none" href="/admin">Login</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="dist/vendor/jquery/jquery.min.js"></script>
    <script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="dist/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="dist/js/sb-admin-2.min.js"></script>

</body>

</html>
