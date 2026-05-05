<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // 1. Fungsi untuk menampilkan daftar (Sudah diperbaiki tadi)
    public function index()
    {
        $pasien = Pasien::latest()->get();
        return view('pasien.index', compact('pasien'));
    }

    // 2. FUNGSI YANG HILANG: Untuk menampilkan halaman form tambah
    public function create()
    {
        return view('pasien.create');
    }

    // 3. Fungsi untuk menyimpan data yang dikirim dari form



    // 4. Fungsi untuk menghapus data
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus!');
    }
   public function store(Request $request)
{
    // HAPUS SEMUA ISI STORE SEMENTARA, GANTI JADI INI:
    dd($request->all());
}
}
