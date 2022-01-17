<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/keretaapi.png') }}" />
    <title>DudeLoka</title>

    <style>
        body {
            padding: 10px;
        }

        .navbar {
            color: black;
            border-radius: 10px;

        }

        .container {
            background-color: #4cae4c;
            color: black;
            border-radius: 5px;
            fill-opacity: 80%;
        }

        .hr{
            size: 10px;
        }

        /* .card-body {
            background-color: #4cae4c;
        } */

    </style>
    {{-- CSS --}}
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-sm bg-success navbar-black">
        <!-- Brand/logo -->
        {{-- <a class="navbar-brand" href="#">Logo</a> --}}
        <a class="navbar-brand">
            <img src="img/keretaapi.png" style="width:50px;" alt="Avatar Logo" class="rounded-pill">
        </a>
        <h4 class="navbar-brand">TIKET KERETA API</h4>

        @if (Route::has('login'))
            @auth
                @if (Auth::user()->role == 'admin')
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('DashboardAdmin') }}" :active="request()->routeIs('DashboardAdmin')" class="nav-link btn btn-success">Dashboard</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('DashboardPenumpang') }}" :active="request()->routeIs('DashboardPenumpang')" class="nav-link btn btn-success">Dashboard</a>
                        </li>
                    </ul>
                @endif
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-2">
                        <i class="material-icons" aria-hidden="true"></i>
                        <a href="{{ route('login') }}" class="nav-link btn btn-primary">Masuk</a>
                    </li>

                    @if (Route::has('register'))
                    <li class="nav-item ml-2">
                        <a href="{{ route('register') }}" class="nav-link btn btn-secondary">Register</a>
                    </li>
                </ul>
            @endif
        @endauth
        @endif
    </nav>
    <br><br>
    <div class="container">
        <center>
            <h1> SELAMAT DATANG </h1><h2>DI PEMESANAN TIKET KERETA API ONLINE</h2>
        </center><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <img src="img/keretaapi.png" style="width:50px;" alt="Avatar Logo" class="rounded-pill">
                            <b>Cari Tiket Kereta Api?</b>
                        </div>

                        <div class="card-body">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect2">Kota Asal</label>
                                    <select class="form-control" name="jurusan_id" id="exampleFormControlSelect2">
                                        <option align="center" value="">-- Pilih Kota Asal --</option>
                                        <option align="center" value="">Bandung</option>
                                        <option align="center" value="">Jakarta</option>
                                        <option align="center" value="">Surabaya</option>
                                        <option align="center" value="">Semarang</option>
                                        <option align="center" value="">Malang</option>
                                        <option align="center" value="">Purwokerto</option>
                                        <option align="center" value="">Solo</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect2">Kota Tujuan</label>
                                    <select class="form-control" name="kereta_id" id="exampleFormControlSelect2">
                                        <option align="center" value="">-- Pilih Kota Tujuan --</option>
                                        <option align="center" value="">Jakarta</option>
                                        <option align="center" value="">Semarang</option>
                                        <option align="center" value="">Solo</option>
                                        <option align="center" value="">Purwokerto</option>
                                        <option align="center" value="">Surabaya</option>
                                        <option align="center" value="">Bandung</option>
                                        <option align="center" value="">Malang</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label for="inputMDEx1">Tanggal Berangkat</label>
                                    <input type="date" value="{{ old('tanggal')}}" name="tanggal" class="form-control @error('tanggal')is-invalid @enderror" id="inputMDEx1" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputMDEx1">Tanggal Pulang</label>
                                    <input type="date" value="{{ old('tanggal')}}" name="tanggal" class="form-control @error('tanggal')is-invalid @enderror" id="inputMDEx1" required>
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlSelect2">Dewasa</label>
                                    <select class="form-control" name="jurusan_id" id="exampleFormControlSelect2">
                                        <option align="center" value="">1</option>
                                        <option align="center" value="">2</option>
                                        <option align="center" value="">3</option>
                                        <option align="center" value="">4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlSelect2">Bayi</label>
                                    <select class="form-control" name="kereta_id" id="exampleFormControlSelect2">
                                        <option align="center" value="">0</option>
                                        <option align="center" value="">1</option>
                                        <option align="center" value="">2</option>
                                        <option align="center" value="">3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for=""></label>
                                    <a href="{{ route('register') }}" class="nav-link btn btn-lg btn btn-secondary">
                                        <i class="fas fa-search"></i>
                                        <span>Cari</span>
                                    </a>
                                </div>
                            </div>
                            <div class="form-row">
                                <span>
                                    <b>*Bayi tidak memperoleh kursi</b>
                                </span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
