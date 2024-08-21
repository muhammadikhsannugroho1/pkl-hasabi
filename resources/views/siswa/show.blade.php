<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail SPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if ($siswa)
                <h3 class="text-center my-4">Detail Siswa</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Nisn</th>
                        <td>{{ $siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Nis</th>
                        <td>{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $siswa->SiswaKelas->nama_kelas }} {{ $siswa->SiswaKelas->kompetensi_keahlian }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $siswa->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No_telpon</th>
                        <td>{{ $siswa->no_telpon }}</td>
                    </tr>
                    <tr>
                        <th>Spp</th>
                        <td>{{ $siswa->SiswaSpp->nominal}}</td>
                    </tr>
                    <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                </table>
                <a href="{{ route('siswa.index') }}" class="btn btn-primary">Kembali</a>
            @else
                <p>Data SPP tidak ditemukan.</p>
                <a href="{{ route('siswa.index') }}" class="btn btn-primary">Kembali</a>
            @endif
        </div>
    </div>
</div>

</body>
</html>
