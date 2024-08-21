<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if ($pembayaran)
                <h3 class="text-center my-4">Detail Pembayaran</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Nisn</th>
                        <td>{{ $pembayaran->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Nis</th>
                        <td>{{ $pembayaran->tgl_bayar }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $pembayaran->bln_bayar }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $pembayaran->tahun_bayar}} </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $pembayaran->id_spp }}</td>
                    </tr>
                    <tr>
                        <th>No_telpon</th>
                        <td>{{ $pembayaran->jumlah_bayar }}</td>
                    </tr>
                   
                    <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                </table>
                <a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Kembali</a>
            @else
                <p>Data SPP tidak ditemukan.</p>
                <a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Kembali</a>
            @endif
        </div>
    </div>
</div>

</body>
</html>
