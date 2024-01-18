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
            body{
                background: url('https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16');
                background-size: cover;
                background-position: center;
            }
            .container{
                background: rgba(255, 255, 255, 0.8); /* Mengatur latar belakang transparan */
                border: 1px solid #ccc; /* Garis tepi */
                border-radius: 10px; /* Sudut membulat */
                width: 100%; 
                height: 75vh;
                border-radius: 10px;
            }
            .card{
                top: 10px;
                width: 180px;
                height: 40px;
                background-color: rgba(93, 232, 172, 0.8); /* Mengatur latar belakang transparan */
                border: 1px solid #ccc; /* Garis tepi */
                border-radius: 10px; /* Sudut membulat */
            }
            .card-title {
                font-size: 24px; 
                font-weight: bold; 
                font-family: 'Times New Roman', sans-serif; 
            }
            thead {
                background: rgba(0, 0, 0, 0.4);
            }
            .btn {
                padding: 4px;
                border: none;
                font-size: 12px;
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buku.index') }}">Buku Saya</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pinjam.index') }}">Pinjam</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('kembali') }}">Kembalikan <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history') }}">History</a>
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

        <center>
            <div class="card text-center">
                <p class="card-title">Buku Dipinjam</p>
            </div>
        </center>

        <br>

        <div class="container">
            <br>
            <br>
            <br>

            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kembali as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>
                            @if ($item->tanggal_kembali == NULL)
                                <form method="POST" action="{{ route('kembali.edit', $item->id_pinjam_buku) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengembalikan buku ini?')">
                                        Kembalikan
                                    </button>
                                </form>
                            @else
                                <button type="button" class="btn btn-secondary" disabled>
                                    Sudah Dikembalikan
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-danger">
                                Belum Ada Buku yang Dipinjam
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{$kembali->links()}}</div>
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
