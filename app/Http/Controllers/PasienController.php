<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // 1. Menampilkan Daftar Pasien
    public function index()
    {
        $pasien = Pasien::latest()->get();
        return view('pasien.index', compact('pasien'));
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
            'no_rm'          => 'required|unique:pasiens,no_rm',
            'nama_pasien'    => 'required',
            'jenis_kelamin'  => 'required',
            'alamat'         => 'required',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }
}
