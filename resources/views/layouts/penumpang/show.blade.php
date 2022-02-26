@extends('user.master')

@section('titleUser')
DudeLoka
@endsection

@section('contentUser')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="justify-content-start">
                                <h4> Informasi Jadwal Keberangkatan Kereta Api DudeLoka </h4>
                            </div>
                            <div class="justify-content-between">
                                <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary">B A Y A
                                    R</a>
                            </div>
                        </div>

                    </div>
                    <br>
                    <table class="table table-hover" id="example">
                        <thead class="thead-light">
                            <tr align="center">
                                <th scope="col">Tanggal keberangkat</th>
                                <th scope="col">Kota Asal</th>
                                <th scope="col">Kota Tujuan</th>
                                <th scope="col">Harga Tiket</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Kereta</th>
                                <th scope="col">Jumlah Penumpang</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr scope="row" align="center">
                                <td>
                                    {{ \Carbon\Carbon::parse($penumpang->tanggal_berangkat)->format('d F Y') }}
                                </td>

                                <td>
                                    {{ $penumpang->kereta->asal->kota_asal }}
                                </td>

                                <td>
                                    {{ $penumpang->kereta->tujuan->kota_tujuan }}
                                </td>

                                <td>
                                    @currency($penumpang->kereta->harga),-
                                </td>

                                <td>
                                    {{ $penumpang->kelas }}
                                </td>

                                <td>
                                    {{ $penumpang->kereta->nama_kereta }} <br>
                                    ({{ $penumpang->kereta->nomor_polisi }})
                                </td>

                                <td>
                                    {{ $penumpang->jumlah_penumpang }} Orang
                                </td>

                                <td>
                                    @currency($penumpang->kereta->harga * $penumpang->jumlah_penumpang),-
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
