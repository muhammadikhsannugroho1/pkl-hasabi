<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('pembayaran.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">NISN</label>
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" placeholder="Masukkan NISN" required>
                            @error('nisn')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">tgl bayar</label>
                            <input type="text" class="form-control @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar" value="{{ old('tgl_bayar') }}" placeholder="Masukkan tanggal pembayaran" required>
                            @error('tgl_bayar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">bln bayar</label>
                            <input type="text" class="form-control @error('bln_bayar') is-invalid @enderror" name="bln_bayar" value="{{ old('bln_bayar') }}" placeholder="Masukkan bulan pembayaran" required>
                            @error('bln_bayar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label class="font-weight-bold">Kelas</label>
                            <select name="kelas_id" class="form-control @error('id_kelas') is-invalid @enderror" required>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id_kelas}}" {{ old('id_kelas') == $item->id_kelas ? 'selected' : '' }}>
                                        {{ $item->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label class="font-weight-bold">tahun bayar</label>
                            <input type="text" class="form-control @error('tahun_bayar') is-invalid @enderror" name="tahun_bayar" value="{{ old('tahun_bayar') }}" placeholder="Masukkan tahun pembayaran" required>
                            @error('tahun_bayar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label class="font-weight-bold">SPP</label>
                            <select name="id_spp" class="form-control @error('id') is-invalid @enderror" required>
                               
                                @foreach ($spp as $item)
                                   <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->tahun }} - Rp {{ number_format($item->nominal, 2, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">jumlah bayar</label>
                            <input type="text" class="form-control @error('jumlah_bayar') is-invalid @enderror" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" placeholder="Masukkan jumlah bayar" required>
                            @error('jumlah_bayar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>