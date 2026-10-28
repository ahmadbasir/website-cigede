<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor_hp',
        'asal_daerah',
        'tanggal_kunjungan'
    ];
}