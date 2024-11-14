<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('admin.login'); // Halaman login untuk pegawai dan manager
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // Proses autentikasi
        $request->authenticate();

        // Regenerasi sesi untuk menghindari session fixation attacks
        $request->session()->regenerate();

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
        

        // Jika peran tidak diketahui, arahkan ke halaman default (misalnya halaman login)
        return redirect()->route('login');
    }

    public function destroy(Request $request): RedirectResponse
    {
        // Logout user
        Auth::guard('web')->logout();

        // Invalidate session dan regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect kembali ke halaman login setelah logout
        return redirect('admin/login');
    }
}
