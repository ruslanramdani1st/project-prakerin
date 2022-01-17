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
                        Tambah Data Asal Berangkat Kereta
                        <a href="{{ route('asal.index')}}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
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

                        <form action="{{ route('asal.store')}}" method="POST">
                            @csrf

                            <div class="form-floating">
                                <label for="floatingInput">Kota Asal Keberangkatan </label>
                                <input type="text" id="floatingInput" value="{{ old('kota_asal')}}" class="form-control @error('kota_asal')is-invalid @enderror" name="kota_asal" placeholder="Masukan Kota Asal .." required>
                                @error('kota_asal')
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
