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

    public function edit($id){
        $laundry = Laundry::findOrFail($id);
        return view('manager.editlayanan', compact('laundry'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_laundry' => 'required|string',
            'jenis_layanan' => 'required|string',
            'tarif_layanan' => 'required|numeric',
            'durasi_layanan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $laundry = Laundry::findOrFail($id);
        $laundry->update($request->all());

        return redirect()->route('manager.viewlayanan')->with('success', 'Layanan laundry berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laundry = Laundry::findOrFail($id);
        $laundry->delete();

        return redirect()->route('manager.viewlayanan')->with('success', 'Layanan laundry berhasil dihapus.');
    }


}
