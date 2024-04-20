<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
        'tgl_pendaftaran',
        'tgl_seleksi1',
        'tgl_seleksi2',
        'tgl_seleksi3',
        'tgl_seleksi4',
        'tgl_pengumuman',
    ];
}
