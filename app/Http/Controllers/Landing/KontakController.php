<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class KontakController extends Controller
{
    public function index()
    {
        return view('landing.kontak');
    }
    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'nullable|string|max:255',
            'pesan' => 'required|string',
        ]);

        ContactMessage::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'subjek' => $data['subjek'] ?? null,
            'pesan' => $data['pesan'],
        ]);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
