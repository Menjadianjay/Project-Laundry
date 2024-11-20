<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_masuk',
        'pelanggan_id',
        'laundry_id',
        'berat',
        'metode_pembayaran',
        'total_harga',
    ];

    public static function calculatePrice($tarif_layanan, $durasiLayanan, $berat)
    {
        // $durasiPrices = [
        //     'Express' => 5000,
        //     'Kilat' => 4000,
        //     'Reguler' => 3000,
        // ];
    
        $pricePerService = $tarif_layanan;
        // $pricePerDuration = $durasiPrices[$durasiLayanan];
    
        return ($pricePerService ) * $berat;
    }

    // Transaction.php
public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
}

public function laundry()
{
    return $this->belongsTo(Laundry::class, 'laundry_id');
}
    
}
