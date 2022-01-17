@extends('admin.master')

@section('titleAdmin')
ADMIN | DudeLoka
@endsection

@section('contentAdmin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Kota Tujuan Berangkat Kereta
                        <a href="{{ route('tujuan.index')}}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-denger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('tujuan.store')}}" method="POST">
                            @csrf

                            <div class="form-floating">
                                <label for="floatingInput">Kota Tujuan Keberangkatan </label>
                                <input type="text" id="floatingInput" value="{{ old('kota_tujuan')}}" class="form-control @error('kota_tujuan')is-invalid @enderror" name="kota_tujuan" placeholder="Masukan Kota Tujuan .." required>
                                @error('kota_tujuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-floating">
                                <button type="submit" class="w-100 btn btn-lg btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
