@extends('user.master')

@section('titleUser')
    DudeLoka
@endsection

@section('contentUser')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Data Transaksi Penumpang
            </div>
            <!-- /.card-heading -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Berangkat</th>
                                <th scope="col">Jumlah Orang</th>
                                <th scope="col">Armada</th>
                                <th scope="col">Kota Asal</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($penumpang as $data)
                                <tr scope="row" align="center">
                                    <td>{{$no++}}</td>
                                    <td>{{\Carbon\Carbon::parse($data->tanggal_berangkat)->format('d F Y')}}</td>
                                    <td>{{$data->jumlah_penumpang}} Orang</td>
                                    <td>{{$data->kereta->nama_kereta}} <br> ({{$data->kereta->nomor_polisi}})</td>
                                    <td>{{$data->kereta->asal->kota_asal}}</td>
                                    <td>{{$data->kereta->tujuan->kota_tujuan}}</td>
                                    <td>{{$data->kelas}}</td>
                                    <td>@currency($data->kereta->harga * $data->jumlah_penumpang),-</td>
                                    <td>
                                        <form action="{{route('penumpang.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            {{-- <a href="{{ route('penumpang.show')}}" class="btn btn-primary float-right">Bayar</a> --}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
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
