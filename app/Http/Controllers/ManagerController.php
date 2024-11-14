<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Laundry;

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
            'jenisLayanan' => 'required|string',
            'jenisLaundry' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        $totalHarga = Transaction::calculatePrice(
            $request->jenisLayanan,
            $request->jenisLaundry,
            $request->berat
        );

        Transaction::create([
            'tanggal_masuk' => $request->tanggalMasuk,
            'nama_pelanggan' => $request->namaPelanggan,
            'jenis_layanan' => $request->jenisLayanan,
            'jenis_laundry' => $request->jenisLaundry,
            'berat' => $request->berat,
            'metode_pembayaran' => $request->metodePembayaran,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('manager.dashboard');

    }

    public function viewdata()
    {
        $transactions = Transaction::all();
        return view('manager.viewdata', compact('transactions'));
    }

    public function editdata($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('manager.editdata', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalMasuk' => 'required|date',
            'namaPelanggan' => 'required|string|max:255',
            'jenisLayanan' => 'required|string',
            'jenisLaundry' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        $transaction = Transaction::findOrFail($id);

        $totalHarga = Transaction::calculatePrice(
            $request->jenisLayanan,
            $request->jenisLaundry,
            $request->berat
        );

        $transaction->update([
            'tanggal_masuk' => $request->tanggalMasuk,
            'nama_pelanggan' => $request->namaPelanggan,
            'jenis_layanan' => $request->jenisLayanan,
            'jenis_laundry' => $request->jenisLaundry,
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
