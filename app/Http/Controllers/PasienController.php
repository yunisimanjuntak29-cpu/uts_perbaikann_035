<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Halaman Daftar Pasien (Tampilkan Tabel)
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    // Halaman Tambah Pasien (Tampilkan Form)
    public function create()
    {
        return view('pasien.create');
    }

    // Proses Simpan Data (Submit Form)
    public function store(Request $request)
    {
        // Validasi sederhana (opsional tapi disarankan)
        $request->validate([
            'no_rekam_medis' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|integer',
        ]);

        // Simpan ke database menggunakan Mass Assignment
        Pasien::create($request->all());

        // SETELAH DATA DISIMPAN: Redirect kembali ke halaman Daftar Pasien
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }
}
