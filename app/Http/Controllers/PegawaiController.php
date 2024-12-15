<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\Laundry;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function dashboard()
    {
        /*$transaksis = DB::table('transactions')->get();
        return view('pegawai.dashboard', ['transaksis' => $transaksis]);*/
        return view('pegawai.dashboard');
    }

    public function inputdata()
    {
        $laundries = DB::table('laundries')->get();
        return view('pegawai.inputdata', ['laundries' => $laundries]);
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
        return redirect()->route('pegawai.dashboard')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function viewdata()
    {
        $transactions = Transaction::paginate(5);
        return view('pegawai.viewdata', compact('transactions'));
    }

    public function editdata($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('pegawai.editdata', compact('transaction'));
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

        return redirect()->route('pegawai.viewdata')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            return redirect()->route('pegawai.viewdata');
        }
        return redirect()->route('pegawai.viewdata');
    }
}
