<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Ticket DudeLoka</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/keretaapi.png') }}" />
    <title>@yield('titleUser')</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="justify-content-start">
                                    <h4> E-Tiket DudeLoka </h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <tr scope="row">
                                    <td>
                                        <label for="nama">
                                            Nama Penumpang
                                        </label>
                                    </td>
                                    <td>:</td>
                                    <td>{{$tiket->nama_rekening}}</td>
                                </tr>

                                <tr scope="row">
                                    <td>
                                        <label for="tanggal">
                                            Alamat
                                        </label>
                                    </td>
                                    <td>:</td>
                                    <td>{{Auth::user()->alamat}}</td>
                                </tr>

                                <tr scope="row">
                                    <td>
                                        <label for="tanggal">
                                            Telepon
                                        </label>
                                    </td>
                                    <td>:</td>
                                    <td>{{Auth::user()->telpon}}</td>
                                </tr>

                                <tr scope="row">
                                    <td>
                                        <label for="tanggal">
                                            E-mail
                                        </label>
                                    </td>
                                    <td>:</td>
                                    <td>{{Auth::user()->email}}</td>
                                </tr>

                                <tr scope="row">
                                    <td>
                                        <label for="tanggal">
                                            Tanggal Pesan
                                        </label>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        {{\Carbon\Carbon::now()->format('l, d F Y  H:i')}} WIB
                                    </td>
                                </tr>
                            </table>
                            <hr>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <div class="justify-content-start">
                                <h4>DATA PERJALANAN</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="example">
                                <thead class="thead-dark">
                                    <tr align="center">
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Plat Polisi</th>
                                        <th scope="col">Nama Kereta</th>
                                        <th scope="col">Kota Berangkat</th>
                                        <th scope="col">Kota Tiba</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr scope="row" align="center">
                                        <td>
                                            {{\Carbon\Carbon::parse($tiket->penumpang->tanggal_berangkat)->format('d F Y')}}
                                        </td>
                                        <td>
                                            {{$tiket->penumpang->kereta->nomor_polisi}}
                                        </td>
                                        <td>
                                            {{$tiket->penumpang->kereta->nama_kereta}}
                                        </td>
                                        <td>
                                            {{$tiket->penumpang->kereta->asal->kota_asal}}
                                        </td>
                                        <td>
                                            {{$tiket->penumpang->kereta->tujuan->kota_tujuan}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <div class="justify-content-start">
                                <h4>DATA PENUMPANG</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="example">
                                <thead class="thead-dark">
                                    <tr align="center">
                                        <th scope="col">Nama Penumpang</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Uang Transfer</th>
                                        <th scope="col">Kembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr scope="row" align="center">
                                        <td>
                                            {{$tiket->nama_rekening}}
                                        </td>
                                        <td>
                                            {{$tiket->penumpang->kelas}}
                                        </td>
                                        <td>
                                            @currency($tiket->penumpang->total) ,-
                                        </td>
                                        <td>
                                            @currency($tiket->jumlah_transfer) ,-
                                        </td>
                                        <td>
                                            @currency($tiket->jumlah_transfer - $tiket->penumpang->total) ,-
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
</body>
</html>
