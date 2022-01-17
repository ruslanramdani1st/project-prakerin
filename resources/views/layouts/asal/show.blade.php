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
                        <div class="card-header">Data Kota Asal Keberangkatan Kereta
                            <a href="{{ route('asal.index') }}" class="btn btn-sm btn-primary float-right">Kembali</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <label for="#">
                                    Kota Asal Keberangkatan :
                                </label>
                                {{$awal->kota_asal}}
                                <br>

                                <label for="#">
                                    Dibuat Pada :
                                </label>
                                {{$awal->created_at->format('l, d F Y')}}
                                <br>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
