<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Tampil Daftar Pasien
    public function index()
    {
        $pasiens = Pasien::latest()->get();
        return view('pasien.index', compact('pasiens'));
    }

    // Tampil Form Tambah
    public function create()
    {
        return view('pasien.create');
    }

    // Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'no_rm'         => 'required|unique:pasiens,no_rm',
            'nama_pasien'   => 'required',
            'jenis_kelamin' => 'required',
            'umur'          => 'required|numeric',
            'alamat'        => 'required',
        ]);

        Pasien::create($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data berhasil disimpan!');
    }

    // FUNGSI EDIT (Yang Error Tadi): Menampilkan Form Edit
  public function edit($id)
{
    // Mengambil data pasien berdasarkan ID, jika tidak ada akan muncul error 404
    $pasien = Pasien::findOrFail($id);

    // Pastikan nama view ('pasien.edit') sesuai dengan nama file .blade.php kamu
    return view('pasien.edit', compact('pasien'));
}

    // FUNGSI UPDATE: Menyimpan Perubahan Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_rm'         => 'required',
            'nama_pasien'   => 'required',
            'jenis_kelamin' => 'required',
            'umur'          => 'required|numeric',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data berhasil diperbarui!');
    }

    // FUNGSI DESTROY: Menghapus Data
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data berhasil dihapus!');
    }

}
