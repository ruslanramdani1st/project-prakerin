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
                        <div class="card-header">Data Kota Tujuan Keberangkatan Kereta
                            <a href="{{ route('tujuan.index') }}" class="btn btn-sm btn-primary float-right">Kembali</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <label for="kota_tujuan">
                                    Kota Tujuan Keberangkatan :
                                </label>
                                {{$tujuan->kota_tujuan}}
                                <br>

                                <label for="created_at">
                                    Dibuat Pada :
                                </label>
                                {{$tujuan->created_at->format('l, d F Y')}}
                                <br>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
