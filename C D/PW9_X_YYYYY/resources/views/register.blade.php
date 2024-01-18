<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <style>
            body {
                background: url('https://wallpapers.com/images/high/zigzag-river-aesthetic-landscape-zrf9jzxpxx736bd0.webp');
                background-size: cover;
                background-position: center;
            }
            .center-container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .register-box {
                background: rgba(255, 255, 255, 0.8); /* Mengatur latar belakang transparan */
                border: 1px solid #ccc; /* Garis tepi */
                border-radius: 10px; /* Sudut membulat */
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Bayangan kotak */
            }
        </style>
    </head>
    <body>
        <div class="container center-container">
            <div class="col-md-6 register-box">
                <h2 class="text-center"><b>Register</b></h2>
                <hr>
                
                @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif

                <form method="post" action="{{route('actionRegister')}}">
                    @csrf
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i>Email</label>
                        <input class="form-control" type="Email" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fa fa-user"></i>Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fa fa-key"></i>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-user"></i>Register
                    </button>

                    <p class="text-center">
                        Sudah punya akun? <a href="{{route('login')}}">Login disini</a>
                    </p>
                </form>
            </div>
        </div>

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
