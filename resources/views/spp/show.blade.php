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
            @if ($spp)
                <h3 class="text-center my-4">Detail SPP</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Tahun</th>
                        <td>{{ $spp->tahun }}</td>
                    </tr>
                    <tr>
                        <th>Nominal</th>
                        <td>{{ $spp->nominal }}</td>
                    </tr>
                    <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                </table>
                <a href="{{ route('spp.index') }}" class="btn btn-primary">Kembali</a>
            @else
                <p>Data SPP tidak ditemukan.</p>
                <a href="{{ route('spp.index') }}" class="btn btn-primary">Kembali</a>
            @endif
        </div>
    </div>
</div>

</body>
</html>
