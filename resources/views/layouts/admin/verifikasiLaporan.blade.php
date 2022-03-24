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
                    Edit Status Pemesanan Tiket Kereta
                    <a href="{{ route('laporanTransaksi')}}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('transaksi.update', $transaksi->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect2">Status</label>
                            <select class="form-control @error('proses_pembayaran')is-invalid @enderror" value="{{$transaksi->proses_pembayaran}}" name="proses_pembayaran" id="exampleFormControlSelect2">
                                <option value="Sedang Diproses">Sedang Diproses</option>
                                <option value="Sudah Dikonfirmasi">Sudah Dikonfirmasi</option>
                                <option value="Gagal Dikonfirmasi">Gagal Dikonfirmasi</option>
                            </select>
                            @error('proses_pembayaran')
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
