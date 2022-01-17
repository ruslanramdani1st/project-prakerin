@extends('admin.master')

@section('titleAdmin')
ADMIN | DudeLoka
@endsection

@section('contentAdmin')
<div class="container">
    <div class="row row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Data Kota Asal Keberangkatan Kereta
                    <a href="{{ route('asal.index')}}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('asal.update', $awal->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-floating">
                            <label for="floatingInput">Asal Keberangkatan </label>
                            <input type="text" id="floatingInput" value="{{$awal->kota_asal}}" class="form-control @error('kota_asal')is-invalid @enderror" name="kota_asal" required>
                            @error('kota_asal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="w-100 btn btn-lg btn-primary">
                            U P D A T E
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
