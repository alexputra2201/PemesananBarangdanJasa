<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assetsLogin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="assetsLogin/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assetsLogin/css/bootstrap.min.css">

     <link rel="icon" href="{{ asset('assets/img/logorjs.png') }}">

    <!-- Style -->
    <link rel="stylesheet" href="assetsLogin/css/style.css">

    <title>Login</title>
</head>

<body>


    <div class="d-lg-flex half">

        <div class="bg order-1 order-md-2" style="background-image: url('assetsLogin/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <div class="container d-flex align-items-center justify-content-center">
                                <a href="/" class="logo"><img src="assets/img/logorjs.png" alt="" class="img-fluid"
                                        style="height: 200px"></a>
                            </div>
                            <h3>Sign Up</h3>
                            <p class="mb-4">Welcome Back!</p>
                        </div>
                        <form action="/register" method="post">
                            @csrf

                            <h5>Username</h5>
                            <div class="form-group last mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" required>
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <h5>Password</h5>
                            <div class="form-group last mb-3 mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required> 
                            </div>


                            <input type="submit" value="Register" class="btn btn-block btn-primary">

                            <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>

                            <div class="social-login">
                                <a href="/login" class="facebook btn d-flex justify-content-center align-items-center">
                                    Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="assetsLogin/js/jquery-3.3.1.min.js"></script>
    <script src="assetsLogin/js/popper.min.js"></script>
    <script src="assetsLogin/js/bootstrap.min.js"></script>
    <script src="assetsLogin/js/main.js"></script>
</body>

</html>