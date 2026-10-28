<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiWisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_air',
        'kondisi_cuaca',
        'status_operasional',
        'informasi_khusus',
    ];
}
