<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Pelanggan;

class ManagerController extends Controller
{
    public function dashboard()
    {
        return view('manager.dashboard');
    }

    public function inputdata()
    {
        // Ambil data jenis_layanan, nama_layanan, dan durasi_layanan dari tabel laundries
        $laundries = Laundry::all();
        return view('manager.inputdata', compact('laundries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggalMasuk' => 'required|date',
            'namaPelanggan' => 'required|string|max:255',
            'noTelp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'layanan' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        // Pecah layanan menjadi jenis layanan dan durasi layanan
        [$jenisLayanan, $durasiLayanan] = explode(' - ', $request->layanan);

        // Buat atau ambil pelanggan berdasarkan nama
        $pelanggan = Pelanggan::updateOrCreate(
            ['nama' => $request->namaPelanggan],
            [
                'no_telp' => $request->noTelp,
                'alamat' => $request->alamat,
            ]
        );

        // Ambil laundry yang sesuai atau buat entri baru
        $laundry = Laundry::updateOrCreate(
            [
                'jenis_layanan' => $jenisLayanan,
                'durasi_layanan' => $durasiLayanan,
            ]
        );

        // Hitung total harga
        $totalHarga = $laundry->tarif_layanan * $request->berat;

        // Simpan transaksi
        Transaction::create([
            'tanggal_masuk' => $request->tanggalMasuk,
            'pelanggan_id' => $pelanggan->id,
            'laundry_id' => $laundry->id,
            'berat' => $request->berat,
            'metode_pembayaran' => $request->metodePembayaran,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('manager.dashboard')->with('success', 'Transaksi berhasil disimpan.');
    }


    public function viewData()
    {
        $transactions = Transaction::with(['pelanggan', 'laundry'])->get();
        return view('manager.viewdata', compact('transactions'));
    }


    public function editdata($id)
    {
        $transaction = Transaction::with('pelanggan', 'laundry')->findOrFail($id);
        $laundries = Laundry::all();
        return view('manager.editdata', compact('transaction', 'laundries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalMasuk' => 'required|date',
            'namaPelanggan' => 'required|string|max:255',
            'noTelp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'layanan' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        $transaction = Transaction::findOrFail($id);

        // Pecah layanan menjadi jenis layanan dan durasi layanan
        [$jenisLayanan, $durasiLayanan] = explode(' - ', $request->layanan);

        // Update pelanggan
        $pelanggan = Pelanggan::updateOrCreate(
            ['nama' => $request->namaPelanggan],
            [
                'no_telp' => $request->noTelp,
                'alamat' => $request->alamat,
            ]
        );

        // Update laundry
        $laundry = Laundry::where('jenis_layanan', $jenisLayanan)
            ->where('durasi_layanan', $durasiLayanan)
            ->firstOrFail();

        // Hitung ulang total harga
        $totalHarga = $laundry->tarif_layanan * $request->berat;

        // Update transaksi
        $transaction->update([
            'tanggal_masuk' => $request->tanggalMasuk,
            'pelanggan_id' => $pelanggan->id,
            'laundry_id' => $laundry->id,
            'berat' => $request->berat,
            'metode_pembayaran' => $request->metodePembayaran,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('manager.viewdata')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            return redirect()->route('manager.viewdata');
        }
        return redirect()->route('manager.viewdata');
    }
}
