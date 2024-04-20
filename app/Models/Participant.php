<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelompok',
        'judul',
        'kategori',
        'deskripsi',
        'thumbnail',
        'ketua',
        'anggota1',
        'anggota2',
        'anggota3',
        'anggota4',
        'nomor1',
        'nomor2',
        'nomor3',
        'nomor4',
        'jenjang',
        'sekolah',
        'cabang',
        'karya',
        'sk',
        'foto',
        'penilai',
        'nilai',
    ];
}
