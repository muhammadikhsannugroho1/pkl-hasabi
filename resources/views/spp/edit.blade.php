<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit SPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center my-4">Edit SPP</h3>
            <form action="{{ route('spp.update', $spp->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', $spp->tahun) }}" required>
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="text" class="form-control" id="nominal" name="nominal" value="{{ old('nominal', $spp->nominal) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <a href="{{ route('spp.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>
