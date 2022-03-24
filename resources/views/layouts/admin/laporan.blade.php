@extends('admin.master')

@section('titleAdmin')
DudeLoka
@endsection

@section('contentAdmin')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Data Laporan Pembayaran Tiket Kereta
        </div>
        <!-- /.card-heading -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="example">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Berangkat</th>
                            <th scope="col">Nama Pengirim</th>
                            <th scope="col">Bank Pengirim</th>
                            <th scope="col">Armada</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($transaksi as $data)
                        <tr scope="row" align="center">
                            <td>{{$no++}}</td>
                            <td>{{\Carbon\Carbon::parse($data->penumpang->tanggal_berangkat)->format('d F Y')}}</td>
                            <td>{{$data->nama_rekening}}</td>
                            <td>{{$data->bank_pengirim}} ke {{$data->bank_tujuan}}</td>
                            <td>{{$data->penumpang->kereta->nama_kereta}} <br> ({{$data->penumpang->kereta->asal->kota_asal}} - {{$data->penumpang->kereta->tujuan->kota_tujuan}})</td>
                            <td>{{$data->penumpang->kelas}}</td>
                            <td>@currency($data->penumpang->total),-</td>
                            <td>{{$data->proses_pembayaran}}</td>
                            <td>
                                <a href="{{route('transaksi.show',$data->id)}}" class="btn btn-warning">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
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
