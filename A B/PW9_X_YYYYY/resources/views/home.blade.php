<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Atma Library</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .dropdown-menu{
                background: rgba(255, 255, 255, 0.8); /* Mengatur latar belakang transparan */
                border: 1px solid #ccc; /* Garis tepi */
                border-radius: 10px; /* Sudut membulat */
                padding: 15px;
            }
            .carousel-caption {
                position: absolute;
                top: 20%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: rgba(255, 255, 255, 0.5);
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 15px;
                height: 90px;
                text-align: center;
            }
            .text-black {
                color: black;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="text-center">
                <h4><b>Atma Library</b></h4>
                <h6>{{ date('Y-m-d') }}</h6>
            </div>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul></ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buku.index') }}">Buku Saya</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pinjam.index') }}">Pinjam</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Kembalikan</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a>NPM PRAKTIKKAN</a>
                    </li>
                </ul>

                 <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" 
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 100px;" alt="Avatar" />
                                <h5 class="mb-2"><strong>{{ Auth::user()->username }}</strong></h5>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div>
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="{{ route('actionLogout') }}"><i class="fa fa-user"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
                
            </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%; height: 86vh;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" style="width: 100%; height: 86vh;">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16" alt="First slide">
                    <div class="carousel-caption">
                        <h1><span class="text-black">Selamat datang <b>{{ Auth::user()->username }}</b></span></h1>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9639.jpg?w=900&t=st=1698697351~exp=1698697951~hmac=6d779c3e84460af609e92bf69eb2650f1c3ceee769b184938f8435ac54f841e5" alt="Second slide">
                    <div class="carousel-caption">
                        <h1><span class="text-black">Selamat datang <b>{{ Auth::user()->username }}</b></span></h1>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9642.jpg?w=900&t=st=1698697349~exp=1698697949~hmac=7088a9d4c117b844da9ad374e974e0e3a867a138cc5d3e6109560a2ee19040e3" alt="Third slide">
                    <div class="carousel-caption">
                        <h1><span class="text-black">Selamat datang <b>{{ Auth::user()->username }}</b></span></h1>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            window.onload = function() {
                // Menghapus riwayat perambanan
                window.history.pushState({}, '', '/'); // Mengganti URL ke halaman login
            }
        </script>

    </body>
</html>
