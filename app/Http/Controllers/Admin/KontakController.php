<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class KontakController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.kontak.index', compact('messages'));
    }

    public function show($id)
    {
        $kontak = ContactMessage::findOrFail($id);
        if (!$kontak->read_at) {
            $kontak->update(['read_at' => now()]);
        }
        return view('admin.kontak.show', ['message' => $kontak]);
    }
}
