<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laundries', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_laundry'); // Kiloan atau satuan
            $table->string('jenis_layanan'); // Cuci setrika atau cuci lipat
            $table->decimal('tarif_layanan', 10, 2);
            $table->string('durasi_layanan'); // Express, 2 hari atau 3 hari
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundries');
    }
};
