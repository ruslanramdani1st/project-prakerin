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
                    Proses Pembayaran Tiket
                    <a href="{{ route('penumpang.index') }}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
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

                    <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="inputMDEx1">Nama Pengirim</label>
                                <input type="text" value="{{ old('nama_rekening') }}" name="nama_rekening" class="form-control @error('nama_rekening')is-invalid @enderror" id="inputMDEx1" placeholder="Masukan Nama Pengirim" required>
                                @error('nama_rekening')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputMDEx1">Nomor Rekening</label>
                                <input type="number" value="{{ old('nomor_rekening') }}" name="nomor_rekening" class="form-control @error('nomor_rekening')is-invalid @enderror" id="inputMDEx1" required>
                                @error('nomor_rekening')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bank_pengirim">Bank Pengirim</label>
                                <select class="form-control" name="bank_pengirim" id="exampleFormControlSelect2">
                                    <option value="">-- Jenis Bank --</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BTN">BTN</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bank_tujuan">Bank Tujuan</label>
                                <select class="form-control" name="bank_tujuan" id="exampleFormControlSelect2">
                                    <option value="">-- Jenis Bank --</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BTN">BTN</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                </select>
                            </div>

                            {{-- @currency($penumpang->kereta->harga * $penumpang->jumlah_penumpang),- --}}
                            <div class="form-group col-md-4">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Total Pembayaran</label>
                                    <input type="text" class="form-control" id="disabledTextInput" placeholder="Rp. 147.000,-">
                                </fieldset>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputMDEx1">Jumlah Transfer</label>
                                <input type="number" value="{{ old('jumlah_transfer') }}" name="jumlah_transfer" class="form-control @error('jumlah_transfer')is-invalid @enderror" id="inputMDEx1" required>
                                @error('jumlah_transfer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="customFile" class="form-group-label">Bukti Pembayaran</label>
                                <input type="file" value="{{ old('bukti_pembayaran') }}" name="bukti_pembayaran" class="form-group-input @error('bukti_pembayaran')is-invalid @enderror" id="customFile" required>
                                @error('bukti_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
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
