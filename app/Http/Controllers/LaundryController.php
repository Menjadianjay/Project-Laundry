<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function create()
    {
        return view('manager.inputlayanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_laundry' => 'required|string',
            'jenis_layanan' => 'required|string',
            'tarif_layanan' => 'required|numeric',
            'durasi_layanan' => 'required|string',
            'keterangan' => 'nullable|string', // Tambahkan validasi keterangan
        ]);

        Laundry::create($request->all());

        return redirect()->route('manager.dashboard')->with('success', 'Layanan laundry berhasil ditambahkan.');
    }

    public function viewlayanan()
    {
        $laundries = Laundry::all();
        return view('manager.viewlayanan', compact('laundries'));
    }
}
