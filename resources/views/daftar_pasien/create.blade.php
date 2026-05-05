@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Halaman Tambah Pasien</h3>
    <hr>

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf <!-- Proteksi CSRF sesuai instruksi soal -->

        <div class="mb-3">
            <label class="form-label">No Rekam Medis</label>
            <input type="text" name="no_rekam_medis" class="form-control" placeholder="Contoh: RM-001" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Umur</label>
            <input type="number" name="umur" class="form-control" placeholder="Berupa angka" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
