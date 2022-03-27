@extends('user.master')

@section('titleUser')
DudeLoka
@endsection

@section('contentUser')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Data Pembayaran Tiket Kereta
        </div>
        <!-- /.card-heading -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="example">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Berangkat</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Jumlah Penumpang</th>
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
                            <td>
                                {{\Carbon\Carbon::parse($data->penumpang->tanggal_berangkat)->format('d F Y')}}
                            </td>
                            <td>
                                {{$data->penumpang->kereta->asal->kota_asal}} - {{$data->penumpang->kereta->tujuan->kota_tujuan}}
                            </td>
                            <td>
                                {{$data->penumpang->jumlah_penumpang}} Orang
                            </td>
                            <td>
                                @currency($data->penumpang->kereta->harga * $data->penumpang->jumlah_penumpang),-
                            </td>
                            <td>
                                {{$data->proses_pembayaran}}
                            </td>
                            <td>
                                @if($data->proses_pembayaran == "Sudah Dikonfirmasi")
                                <a href="{{route('GETiket',$data->id)}}" class="btn btn-primary">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </a>
                                @endif

                                <form action="{{route('transaksi.destroy', $data->id)}}" method="post">
                                    @method('delete')
                                    @csrf
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
