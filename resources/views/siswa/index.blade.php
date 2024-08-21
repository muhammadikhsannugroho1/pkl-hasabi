<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Siswa</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SISWA</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">NISN</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">SPP</th>
                            <th scope="col">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($siswa as $d)
                            <tr>
                                <td>{{ $d->nisn }}</td>
                                <td>{{ $d->nis }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->SiswaKelas->nama_kelas }} {{ $d->SiswaKelas->kompetensi_keahlian }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->no_telpon }}</td>
                                <td>{{ $d->SiswaSpp->nominal}}</td>

                               
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $d->id_siswa) }}" method="POST">
                                        <a href="{{ route('siswa.show', $d->id_siswa) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('siswa.edit', $d->id_siswa) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Siswa belum Tersedia.</td>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))
    toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
    toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>

</body>
</html>
