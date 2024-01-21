<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/x-icon">

    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- JS Script --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>Login</title>
</head>

<body>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                    icon: 'error',
                    title: "{{ $error }}",
                })
            </script>
        @endforeach
    @endif
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
            })
        </script>
    @endif
    <center>
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 col-md-offset-3 bg-white">
                    <div class="panel">
                        <div class="panel-heading pt-3">
                            <div class="panel-title text-center mt-4" id="title">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Bookrary Logo" width="80%"
                                    class="logo img-responsive">
                                <hr>
                            </div>
                        </div>
                        <div class="panel-body mt-3">
                            <div class="row">
                                <div class="col-lg-12 forms">
                                    <form id="login-form" class="col-lg-offset-1 col-lg-10 forms"
                                        action="{{ route('checkLogin') }}" method="post" style="display: block;">
                                        @csrf
                                        @method('POST')
                                        <div class="mt-1 d-flex align-items-center">
                                            <i class="bi bi-person me-2"></i>
                                            <input type="text" name="username" id="username" tabindex="1"
                                                class="form-control" placeholder="Username" autocomplete="off" required>
                                        </div>
                                        <div class="mt-4 d-flex align-items-center">
                                            <i class="bi bi-key me-2"></i>
                                            <input type="password" name="password" id="password" tabindex="2"
                                                class="form-control" placeholder="Password"
                                                autocomplete="current-password" required>
                                        </div>
                                        <div class="form-check showPasswordInput mt-3">
                                            <input class="form-check-input" type="checkbox" value=""
                                                onclick="showPasswords()" id="showPassword"
                                                style="border: 1px solid #BABABA !important;">
                                            <label class="form-check-label" for="showPassword" id="showPasswordLabel"
                                                style="transform: none !important; float: left;">
                                                Show password
                                            </label>
                                        </div>
                                        <div class="col-md-12 col-sm-6 col-sm-offset-3 mt-5">
                                            <button type="submit" name="login-submit" id="login-submit" tabindex="3"
                                                class="btn btn-login" value="LOGIN"> Log in</button>
                                        </div>
                                        <div class="col-sm-12 col-md-12 pt-4 pb-4 mb-5">
                                            <a href="javascript:void(0)" class="registerAccount link"
                                                style="color: #BABABA;" data-bs-toggle="modal"
                                                data-bs-target="#registerModal"> Register Account here</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>

    {{-- Modal for Registration of Users --}}
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{ route('register') }}" method="POST" class="form-group">
                            @csrf
                            @method('POST')
                            <div class="col-md-12">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Middlename</label>
                                <input type="text" name="middlename" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Date of Birth</label>
                                <input type="date" name="birthday" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                    </div>
                </div>
                <div class="modal-footer pt-5 pb-4 px-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
