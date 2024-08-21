<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kelas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Kelas</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('kelas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH KELAS</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">kompetensi</th>
                            <th scope="col">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($data as $kelas)
                            <tr>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td>{{ $kelas->kompetensi_keahlian }}</td>
                                <td class="text-center">
                                    @if(!$kelas->trashed())
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelas.destroy', $kelas->id_kelas) }}" method="POST">
                                        <a href="{{ route('kelas.show', $kelas->id_kelas) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('kelas.edit', $kelas->id_kelas) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                    @else
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelas.restore', $kelas->id_kelas) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-warning">RESTORE</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">Data Kelas belum Tersedia.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
             
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
