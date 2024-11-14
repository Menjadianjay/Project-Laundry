<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_laundry',
        'jenis_layanan',
        'tarif_layanan',
        'durasi_layanan',
    ];
}
