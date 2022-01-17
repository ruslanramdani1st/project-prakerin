@extends('admin.master')

@section('titleAdmin')
ADMIN | DudeLoka
@endsection

@section('contentAdmin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">Data Kereta Api DudeLoka
                            <a href="{{ route('kereta.index') }}" class="btn btn-sm btn-primary float-right">Kembali</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <label for="#">
                                    Nomor Polisi :
                                </label>
                                {{$kereta->nomor_polisi}}
                                <br>

                                <label for="#">
                                    Nama Kereta :
                                </label>
                                {{$kereta->nama_kereta}}
                                <br>

                                <label for="#">
                                    Waktu Keberangkatan :
                                </label>
                                {{\Carbon\Carbon::parse($kereta->tanggal_berangkat)->format('d F Y')}}
                                <br>

                                <label for="#">
                                    Kota Asal :
                                </label>
                                {{$kereta->asal->kota_asal}}
                                <br>

                                <label for="#">
                                    Kota Tujuan :
                                </label>
                                {{$kereta->tujuan->kota_tujuan}}
                                <br>

                                <label for="#">
                                    Harga Tiket :
                                </label>
                                {{$kereta->harga}}
                                <br>

                                <label for="#">
                                    Dibuat Pada :
                                </label>
                                {{$kereta->created_at->format('l, d F Y')}}
                                <br>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
