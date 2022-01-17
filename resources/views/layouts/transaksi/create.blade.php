@extends('admin.master')

@section('titleAdmin')
ADMIN | DudeLoka
@endsection

@section('contentAdmin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Kereta Api
                        <a href="{{ route('kereta.index')}}" class="btn btn-sm  btn-success float-right"> <i class="fa fa-undo" aria-hidden="true"> Kembali</i></a>
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

                        <form action="{{ route('kereta.store')}}" method="POST">
                            @csrf

                            <div class="form-group col-md-6">
                                <label for="inputMDEx1">Tanggal Berangkat</label>
                                <input type="date" value="{{ old('tanggal_berangkat')}}" name="tanggal_berangkat" class="form-control @error('tanggal_berangkat')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Nama Kereta .." required>
                                @error('tanggal_berangkat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="jumlah_orang">Jumlah Orang</label>
                                <select class="form-control" name="jumlah_orang" id="exampleFormControlSelect2">
                                    <option value="">-- Jumlah Orang --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <form method="post" action="">
                                masukan banyak Bilangan
                                <input type="number" name="bil" required />
                                <input type="submit" name="simpan" value="submit" />
                                <input type="reset">
                            </form>
                            @php
                            if (isset($_POST['simpan'])) {
                            echo "<h64>INPUT BILANGAN</h64>";

                                $jumlah_penumpang = $_POST['jumlah_penumpang'];

                                echo "<form method='post' action='outputbilangan.php'>";
                                for ($a = 0; $a <= $jumlah_penumpang-1; $a++) {
                                    echo "Bilangan Ke-".($a+1)." <input type='text' name='input".$a."'><br>";
                                }
                                echo "<input type='submit' value='INPUT' name='get'>";
                                echo "<input type='hidden' name='h' value='".$bil."'>";
                                echo "</form>";
                            }
                            @endphp

                            {{-- OUTPUT --}}

                            @php
                            if (isset($_POST['get'])){
                            $h = $_POST['h'];
                            for ($i= 0; $i <= $h - 1; $i++)
                            {
                            $bilangan[$i] = $_POST['input'.$i];
                            }
                            $jumlah = 0;
                            for ($i=0; $i <= $h - 1; $i++)
                            {
                            $jumlah += $bilangan[$i];
                            }
                            $rataRata = $jumlah/$h;
                            for ($i=0; $i <= $h - 1; $i++)
                            {
                            echo "Bilangan ke-".($i+1)." = ".$bilangan[$i]."<br>";
                            }
                            echo "<br>Rata-ratanya adalah : ".$rataRata . "<br>";
                            }
                            @endphp

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputMDEx1">Nomor Polisi</label>
                                    <input type="text" value="{{ old('nomor_polisi')}}" name="nomor_polisi" class="form-control @error('nomor_polisi')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Nomor Polisi .." required>
                                    @error('nomor_polisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputMDEx1">Nama Kereta</label>
                                    <input type="text" value="{{ old('nama_kereta')}}" name="nama_kereta" class="form-control @error('nama_kereta')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Nama Kereta .." required>
                                    @error('nama_kereta')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputMDEx1">Tanggal Berangkat</label>
                                    <input type="date" value="{{ old('tanggal_berangkat')}}" name="tanggal_berangkat" class="form-control @error('tanggal_berangkat')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Nama Kereta .." required>
                                    @error('tanggal_berangkat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="kegiatan">Kota Asal</label>
                                    <select class="form-control" name="asal_id" id="exampleFormControlSelect2">
                                        <option value="">-- Pilih Kota --</option>
                                        @foreach ($dataasal as $datanya)
                                            <option value="{{$datanya->id}}" {{ old('asal_id') == $datanya->id ? 'selected' : null }}>{{$datanya->kota_asal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="kegiatan">Kota Tujuan</label>
                                    <select class="form-control" name="tujuan_id" id="exampleFormControlSelect2">
                                        <option value="">-- Pilih Kota --</option>
                                        @foreach ($datatujuan as $data)
                                            <option value="{{$data->id}}" {{ old('tujuan_id') == $datanya->id ? 'selected' : null }}>{{$data->kota_tujuan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputMDEx1">Harga Tiket</label>
                                    <input type="number" value="{{ old('harga')}}" name="harga" class="form-control @error('harga')is-invalid @enderror" id="inputMDEx1"  placeholder="Masukan Harga Tiket" required>
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

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
