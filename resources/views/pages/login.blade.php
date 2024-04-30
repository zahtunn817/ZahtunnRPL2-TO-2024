<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <img class="col-lg-6 d-none d-lg-block" src="{{ asset('img/kantor.jpg') }}"></img>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{ route('cekLogin') }}" method="post" novalidate>
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control
                                            @error('email')
                                            is-invalid
                                        @enderror form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password')
                                            is-invalid
                                        @enderror form-control-user" id="exampleInputPassword" placeholder="Password" name="password" value="{{ old('password') }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        @error('notfound')
                                        <div class="row mt-2">
                                            <div class="text-center col-12 text-danger">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="small">Silahkan hubungi admin apabila lupa password.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('sbadmin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin') }}/js/sb-admin-2.min.js"></script>

</body>

</html>