<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'indeks',
        'tambahan',
    ];

    protected $casts = [
        'indeks' => 'array',
        'tambahan' => 'array',
    ];
}
