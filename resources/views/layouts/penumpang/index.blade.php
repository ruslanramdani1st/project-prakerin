@extends('user.master')

@section('titleUser')
    DudeLoka
@endsection

@section('contentUser')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Data Jadwal Keberangkatan
            </div>
            <!-- /.card-heading -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Berangkat</th>
                                <th scope="col">Nama Kereta</th>
                                <th scope="col">Kota Asal</th>
                                <th scope="col">Kota Tujuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($kereta as $data)
                                <tr scope="row" align="center">
                                    <td>{{$no++}}</td>
                                    <td>{{\Carbon\Carbon::parse($data->tanggal_berangkat)->format('d F Y')}}</td>
                                    <td>{{$data->nama_kereta}} <br> ({{$data->nomor_polisi}})</td>
                                    <td>{{$data->asal->kota_asal}}</td>
                                    <td>{{$data->tujuan->kota_tujuan}}</td>
                                    <td>Rp.{{$data->harga}},-</td>
                                    <td>
                                        <a href="{{ route('transaksi.create')}}" class="btn btn-primary float-right">Pesan</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
