@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Halaman Daftar Pasien</h3>

    <!-- Tombol Tambah Pasien Baru di atas tabel -->
    <div class="mb-3 text-end">
        <a href="{{ route('pasien.create') }}" class="btn btn-success">Tambah Pasien Baru</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No. Rekam Medis</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $p)
            <tr>
                <td>{{ $p->no_rekam_medis }}</td>
                <td>{{ $p->nama_pasien }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->umur }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
