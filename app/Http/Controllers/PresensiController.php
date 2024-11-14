<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
        public function presensi()
    {
        return view('pegawai.presensi');
    }
    public function presensimanager()
    {
        return view('manager.presensi');
    }

    // Menyimpan data presensi ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kehadiran' => 'required|string',
            'keterangan' => 'nullable|string',
            'upload' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        // Jika ada file upload, simpan file dan dapatkan path-nya
        if ($request->hasFile('upload')) {
            $uploadPath = $request->file('upload')->store('uploads', 'public');
        } else {
            $uploadPath = null;
        }

        // Simpan data ke dalam tabel presensis
        Presensi::create([
            'nama_pegawai' => $request->nama,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
            'upload' => $uploadPath,
        ]);

        // Redirect atau menampilkan pesan sukses
        // return redirect()->route('pegawai.dashboard')->with('success', 'Presensi berhasil disimpan.');
        // Ambil pengguna yang sedang login
        $user = Auth::user();
        // Cek peran pengguna (pegawai atau manager)
        if ($user->name === 'manager') {
            // Redirect ke halaman manager jika pengguna adalah manager
            return redirect()->intended(route('manager.dashboard'));
        } elseif (in_array($user->name, ['Ferdy', 'Mado', 'Rio', 'Juliano'])) {
            // Redirect ke halaman pegawai jika pengguna adalah pegawai dengan nama yang disebutkan
            return redirect()->intended(route('pegawai.dashboard'));
        }
    }

    // Menampilkan data presensi dalam bentuk tabel di dashboard Pegawai
    public function viewpresensi()
    {
        $presensis = Presensi::all(); // Mengambil semua data presensi dari database
        return view('pegawai.viewpresensi', compact('presensis'));
    }
    // Menampilkan data presensi dalam bentuk tabel di dashboard Manager
    public function viewpresensiManager()
    {
        $presensis = Presensi::all(); // Mengambil semua data presensi dari database
        return view('manager.viewpresensi', compact('presensis'));
    }

    public function showFile($id)
    {
        // Cari data presensi berdasarkan ID
        $presensi = Presensi::find($id);

        // Jika data presensi ditemukan dan ada file yang diupload
        if ($presensi && $presensi->upload) {
            // Buat path lengkap ke file
            $filePath = storage_path('app/public/' . $presensi->upload);

            // Periksa apakah file ada di server
            if (file_exists($filePath)) {
                // Mengembalikan file ke browser untuk ditampilkan atau didownload
                return response()->file($filePath);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'Presensi atau file tidak ditemukan.');
        }
    }

        // Menampilkan form edit presensi
    public function editpresensi($id)
    {
        $presensi = Presensi::findOrFail($id);
        return view('manager.editpresensi', compact('presensi'));
    }

    // Memperbarui data presensi di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kehadiran' => 'required|string',
            'keterangan' => 'nullable|string',
            'upload' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        $presensi = Presensi::findOrFail($id);

        // Jika ada file upload, simpan file dan dapatkan path-nya
        if ($request->hasFile('upload')) {
            $uploadPath = $request->file('upload')->store('uploads', 'public');
        } else {
            $uploadPath = $presensi->upload; // Tetap gunakan file lama jika tidak ada yang diupload
        }

        // Perbarui data presensi di dalam tabel presensis
        $presensi->update([
            'nama_pegawai' => $request->nama,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
            'upload' => $uploadPath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('manager.viewpresensi')->with('success', 'Presensi berhasil diperbarui.');
    }

    // Menghapus data presensi dari database
    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);

        // Hapus data presensi
        $presensi->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('manager.viewpresensi')->with('success', 'Presensi berhasil dihapus.');
    }

}
