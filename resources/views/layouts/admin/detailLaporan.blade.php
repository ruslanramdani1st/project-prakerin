@extends('admin.master')

@section('titleAdmin')
ADMIN | DudeLoka
@endsection

@section('contentAdmin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="justify-content-start">
                                <h4> Detail Laporan </h4>
                            </div>
                            <div class="justify-content-between">
                                <a href="{{route('transaksi.edit',$transaksi->id)}}" class="btn btn-success">
                                    <i class="fas fa-pen"> Edit </i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <tr scope="row">
                                <td>
                                    <label for="nip">
                                        Tanggal Berangkat
                                    </label>
                                </td>
                                <td>:</td>
                                <td>
                                    {{\Carbon\Carbon::parse($transaksi->penumpang->tanggal_berangkat)->format('d F Y')}}
                                </td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="nama">
                                        Nomor Rekening
                                    </label>
                                </td>
                                <td>:</td>
                                <td>{{$transaksi->nomor_rekening}}</td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="nama">
                                        Nama Pemesan Tiket
                                    </label>
                                </td>
                                <td>:</td>
                                <td>{{$transaksi->nama_rekening}}</td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="golongan">
                                        Bank
                                    </label>
                                </td>
                                <td>:</td>
                                <td>{{$transaksi->bank_pengirim}} ke {{$transaksi->bank_tujuan}}</td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="tanggal">
                                        Armada
                                    </label>
                                </td>
                                <td>:</td>
                                <td>{{$transaksi->penumpang->kereta->nama_kereta}} <br> ({{$transaksi->penumpang->kereta->asal->kota_asal}} - {{$transaksi->penumpang->kereta->tujuan->kota_tujuan}})</td>
                            </tr>
                            <tr scope="row">
                                <td>
                                    <label for="waktu">
                                        Kelas
                                    </label>
                                </td>
                                <td>:</td>
                                <td>{{$transaksi->penumpang->kelas}}</td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="kegiatan">
                                        Total Harga
                                    </label>
                                </td>
                                <td>:</td>
                                <td>@currency($transaksi->penumpang->total) ,-</td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="kegiatan">
                                        Uang Masuk
                                    </label>
                                </td>
                                <td>:</td>
                                <td>@currency($transaksi->jumlah_transfer) ,-</td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="uraian">
                                        Status
                                    </label>
                                </td>
                                <td>:</td>
                                <td>{{$transaksi->proses_pembayaran}}</td>
                            </tr>

                            <tr scope="row">
                                <td>
                                    <label for="uraian">
                                        Bukti Pembayaran
                                    </label>
                                </td>
                                <td>:</td>
                                <td>
                                    @if ($transaksi->bukti_pembayaran)
                                    <div class="max-height: 350px; overflow:hidden;">
                                        <img src="{{asset('storage/' . $transaksi->bukti_pembayaran)}}" class="img-fluid mt-3" alt="{{$transaksi->bukti_pembayaran}}">
                                    </div>
                                    @else
                                    <img src="https://source.unsplash.com/1200x400?{{ $transaksi->bukti_pembayaran}}" alt="{{ $transaksi->bukti_pembayaran}}" class="img-fluid mt-3">
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
