<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_laundry',      // Kiloan atau satuan
        'jenis_layanan',      // Cuci setrika atau cuci lipat
        'tarif_layanan',      // Tarif untuk layanan
        'durasi_layanan',     // Express, 2 hari, atau 3 hari
        'keterangan',         // Deskripsi tambahan
    ];

    /**
     * Menggabungkan jenis layanan dan durasi layanan menjadi satu string.
     */
    public function getLayananAttribute()
    {
        return "{$this->jenis_layanan} - {$this->durasi_layanan}";
    }

    /**
     * Membagi layanan gabungan menjadi jenis layanan dan durasi layanan.
     * @param string $layanan
     */
    public function setLayananAttribute($layanan)
    {
        [$jenisLayanan, $durasiLayanan] = explode(' - ', $layanan);
        $this->attributes['jenis_layanan'] = $jenisLayanan;
        $this->attributes['durasi_layanan'] = $durasiLayanan;
    }
}
