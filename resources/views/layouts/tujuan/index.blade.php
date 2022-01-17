@extends('admin.master')

@section('titleAdmin')
    ADMIN | DudeLoka
@endsection

@section('contentAdmin')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Data Kota Tujuan Keberangkatan Kereta
                <a href="{{ route('tujuan.create')}}" class="btn btn-primary float-right">Tambah</a>
            </div>
            <!-- /.card-heading -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">No</th>
                                <th scope="col">Kota Tujuan</th>
                                <th scope="col">Dibuat Pada</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($tujuan as $data)
                                <tr scope="row">
                                    <td align="center">{{$no++}}</td>
                                    <td>{{$data->kota_tujuan}}</td>
                                    <td align="center">
                                        {{\Carbon\Carbon::parse($data->created_at)->format('l, d F Y')}}
                                    </td>
                                    <td>
                                        <form action="{{route('tujuan.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf

                                        <a href="{{route('tujuan.edit',$data->id)}}" class="btn btn-success">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{route('tujuan.show',$data->id)}}" class="btn btn-warning">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
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
