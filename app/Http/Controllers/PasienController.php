<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // 1. Menampilkan Daftar Pasien
   public function index()
{
    // Gunakan nama variabel $pasiens (dengan huruf s)
    $pasiens = Pasien::latest()->get();

    // Pastikan dikirim dengan nama yang sama
    return view('pasien.index', compact('pasiens'));
}

    // 2. Menampilkan Form Tambah Pasien
    public function create()
    {
        return view('pasien.create');
    }

    // 3. Menyimpan Data Pasien Baru
 public function store(Request $request)
{
    $request->validate([
        'no_rm' => 'required',
        'nama_pasien' => 'required',
        'jenis_kelamin' => 'required',
        'umur' => 'required|numeric',
    ]);

    Pasien::create($request->all());

    return redirect()->route('pasien.index')->with('success', 'Data Berhasil Disimpan');
}
}
