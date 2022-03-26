<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Ticket DudeLoka</title>
</head>
<body>
    <h4> Detail Laporan </h4>
    <br>
    <table class="table table-hover">

        <tr scope="row">
            <td>
                <label for="nama">
                    Nama Penumpang
                </label>
            </td>
            <td>:</td>
            <td>{{$tiket->nama_rekening}}</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="tanggal">
                    Alamat
                </label>
            </td>
            <td>:</td>
            <td>{{Auth::user()->alamat}}</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="tanggal">
                    Telepon
                </label>
            </td>
            <td>:</td>
            <td>{{Auth::user()->telpon}}</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="tanggal">
                    E-mail
                </label>
            </td>
            <td>:</td>
            <td>{{Auth::user()->email}}</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="tanggal">
                    Tanggal Pesan
                </label>
            </td>
            <td>:</td>
            <td>
                {{\Carbon\Carbon::now()->format('l, d F Y  H:i')}} WIB
            </td>
        </tr>

        <tr scope="row">
            <td>
                <label for="tanggal">
                    Tanggal Berangkat
                </label>
            </td>
            <td>:</td>
            <td>
                {{\Carbon\Carbon::parse($tiket->penumpang->tanggal_berangkat)->format('d F Y')}}
            </td>
        </tr>

        <tr scope="row">
            <td>
                <label for="golongan">
                    Bank
                </label>
            </td>
            <td>:</td>
            <td>{{$tiket->bank_pengirim}} ke {{$tiket->bank_tujuan}}</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="tanggal">
                    Armada
                </label>
            </td>
            <td>:</td>
            <td>{{$tiket->penumpang->kereta->nama_kereta}} <br> ({{$tiket->penumpang->kereta->asal->kota_asal}} - {{$tiket->penumpang->kereta->tujuan->kota_tujuan}})</td>
        </tr>
        <tr scope="row">
            <td>
                <label for="waktu">
                    Kelas
                </label>
            </td>
            <td>:</td>
            <td>{{$tiket->penumpang->kelas}}</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="kegiatan">
                    Total Harga
                </label>
            </td>
            <td>:</td>
            <td>@currency($tiket->penumpang->total) ,-</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="kegiatan">
                    Uang Masuk
                </label>
            </td>
            <td>:</td>
            <td>@currency($tiket->jumlah_transfer) ,-</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="kegiatan">
                    Uang Kembalian
                </label>
            </td>
            <td>:</td>
            <td>@currency($tiket->jumlah_transfer - $tiket->penumpang->total) ,-</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="uraian">
                    Status
                </label>
            </td>
            <td>:</td>
            <td>{{$tiket->proses_pembayaran}}</td>
        </tr>

        <tr scope="row">
            <td>
                <label for="uraian">
                    Bukti Pembayaran
                </label>
            </td>
            <td>:</td>
            <td>
                @if ($tiket->bukti_pembayaran)
                <div class="max-height: 350px; overflow:hidden;">
                    <img src="{{asset('storage/' . $tiket->bukti_pembayaran)}}" class="img-fluid mt-3" alt="{{$tiket->bukti_pembayaran}}">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $tiket->bukti_pembayaran}}" alt="{{ $tiket->bukti_pembayaran}}" class="img-fluid mt-3">
                @endif
            </td>
        </tr>
    </table>
</body>
</html>
