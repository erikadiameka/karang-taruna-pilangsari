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
        $readCount = ContactMessage::whereNotNull('read_at')->count();

        return view('admin.kontak.index', compact('messages', 'readCount'));
    }

    public function show($id)
    {
        $kontak = ContactMessage::findOrFail($id);
        if (!$kontak->read_at) {
            $kontak->update(['read_at' => now()]);
        }
        return view('admin.kontak.show', ['message' => $kontak]);
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function destroySelected(Request $request)
    {
        $request->validate([
            'selected' => 'required|array|min:1',
            'selected.*' => 'integer|exists:contact_messages,id',
        ]);

        ContactMessage::whereIn('id', $request->input('selected'))->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan terpilih berhasil dihapus.');
    }

    public function destroyRead()
    {
        ContactMessage::whereNotNull('read_at')->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Semua pesan terbaca berhasil dihapus.');
    }
}
