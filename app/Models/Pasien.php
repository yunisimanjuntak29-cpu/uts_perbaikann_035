<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pasiens';

    // Mass Assignment sesuai instruksi nomor 2
    protected $fillable = [
        'no_rekam_medis',
        'nama_pasien',
        'jenis_kelamin',
        'umur'
    ];
}
