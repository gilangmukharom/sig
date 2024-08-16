<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnalyzeDashboardController extends Controller
{
    public function index()
    {
        return view('analyze.dashboard');
    }

    public function setting()
    {
        return view('analyze.settings', ['title' => 'Settings']);
    }
    
    public function profileUser()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('analyze.profile', [
            'title' => 'Profile',
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user_analyze,username,' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:user_analyze,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'work' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            // Hapus gambar lama jika ada
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Simpan gambar baru
            $path = $request->file('profile_image')->store('profile_images', 'public');

            // Update kolom profile_image di database
            DB::table('user_analyze')
            ->where('id', Auth::id())
                ->update(['profile_image' => $path]);
        }

        // Update data user lainnya menggunakan Query Builder
        DB::table('user_analyze')
        ->where('id', Auth::id())
            ->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'work' => $request->work,
            ]);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile-user')->with('status', 'Profile updated successfully.');
    }
}