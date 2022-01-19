@extends('user.master')

@section('titleUser')
DudeLoka
@endsection

@section('contentUser')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Boking
                        <a href="{{ route('penumpang.index')}}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
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

                        <form action="{{ route('penumpang.store')}}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputMDEx1">Tanggal Berangkat</label>
                                    <input type="date" value="{{ old('tanggal_berangkat')}}" name="tanggal_berangkat" class="form-control @error('tanggal_berangkat')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Nama Kereta .." required>
                                    @error('tanggal_berangkat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="kereta_id">Pilih Armada</label>
                                    <select class="form-control" name="kereta_id" id="exampleFormControlSelect2">
                                        <option value="">-- Pilih Armada --</option>
                                        @foreach ($datakereta as $kereta)
                                            <option class="col-md-3" value="{{$kereta->id}}" {{ old('kereta_id') == $kereta->id ? 'selected' : null }}>
                                                {{$kereta->nama_kereta}} <br>
                                                ({{$kereta->asal->kota_asal}} - {{$kereta->tujuan->kota_tujuan}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="jumlah_penumpang">Jumlah Orang</label>
                                    <select class="form-control" name="jumlah_penumpang" id="exampleFormControlSelect2">
                                        <option value="">-- Jumlah Orang --</option>
                                        <option value="1">1 Orang</option>
                                        <option value="2">2 Orang</option>
                                        <option value="3">3 Orang</option>
                                        <option value="4">4 Orang</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="kelas">Pilih Kelas</label>
                                    <select class="form-control" name="kelas" id="exampleFormControlSelect2">
                                        <option value="">-- Pilih Kelas --</option>
                                        <option value="eksekutif">Kelas Eksekutif</option>
                                        <option value="bisnis">Kelas Bisnis</option>
                                        <option value="ekonomi">Kelas Ekonomi</option>
                                        <option value="premium">Kelas Premium</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-floating">
                                <button name="simpan" type="submit" class="w-100 btn btn-lg btn-primary">
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
