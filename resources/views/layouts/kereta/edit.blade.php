@extends('admin.master')

@section('titleAdmin')
ADMIN | DudeLoka
@endsection

@section('contentAdmin')
<div class="container">
    <div class="row row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Kereta Api
                    <a href="{{ route('kereta.index')}}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kereta.update', $kereta->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputMDEx1">Nomor Polisi</label>
                                <input type="text" value="{{$kereta->nomor_polisi}}" name="nomor_polisi" class="form-control @error('nomor_polisi')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Nomor Polisi .." required>
                                @error('nomor_polisi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group col-md-4">
                                <label for="inputMDEx1">Nama Kereta</label>
                                <input type="text" value="{{$kereta->nama_kereta}}" name="nama_kereta" class="form-control @error('nama_kereta')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Nama Kereta .." required>
                                @error('nama_kereta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group col-md-4">
                                <label for="inputMDEx1">Tanggal Berangkat</label>
                                <input type="date" value="{{$kereta->tanggal_berangkat}}" name="tanggal_berangkat" class="form-control @error('tanggal_berangkat')is-invalid @enderror" id="inputMDEx1" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect2">Kota Asal </label>
                                <select class="form-control @error('asal_id')is-invalid @enderror" name="asal_id" value="{{$kereta->asal_id}}" id="exampleFormControlSelect2">
                                    <option value="">-- Pilih Kota --</option>
                                    @foreach ($dataasal as $datanya)
                                    <option value="{{$datanya->id}}" {{ old('asal_id') == $datanya->id ? 'selected' : null }}>{{$datanya->kota_asal}}</option>
                                    @endforeach
                                </select>
                                @error('asal_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect2">Kota Tujuan </label>
                                <select class="form-control @error('tujuan_id')is-invalid @enderror" name="tujuan_id" value="{{$kereta->tujuan_id}}" id="exampleFormControlSelect2">
                                    <option value="">-- Pilih Kota --</option>
                                    @foreach ($datatujuan as $data)
                                        <option value="{{$data->id}}">{{$data->kota_tujuan}}</option>
                                    @endforeach
                                </select>
                                @error('tujuan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group col-md-4">
                                <label for="floatingInput">Harga Tiket</label>
                                <input type="number" id="floatingInput" value="{{$kereta->harga}}" class="form-control @error('harga')is-invalid @enderror" name="harga" placeholder="Masukan Harga Tiket .." required>
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
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
