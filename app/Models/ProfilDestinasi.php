<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDestinasi extends Model
{
    protected $fillable = [
    'nama_destinasi',
    'deskripsi',
    'sejarah',
];
}
