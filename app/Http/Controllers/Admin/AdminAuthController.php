<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function Hal_Admin_login(){
        return view ('admin-login',[
            'title' => 'Admin-login',
        ]);
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/admin/dashboard');
        }

        // Authentication failed
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // Hapus session & token lama
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); // arahkan ke halaman login admin
    }
}
