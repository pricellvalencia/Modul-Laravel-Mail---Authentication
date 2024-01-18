<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function index()
    {
        // Mengambil pengguna yang sedang login
        $user = Auth::user();
        
        // Mengambil data buku berdasarkan id_user yang sedang login
        $buku = Buku::where('id_penerbit', $user->id_user)->paginate(5);

        return view('Buku.index', compact('buku'));
    }

    public function create()
    {
        return view('Buku.create');
    }

    public function store(Request $request)
    {
        // Mengambil pengguna yang sedang login
        $user = Auth::user();
        
        // Validasi inputan
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
        ]);

        // Membuat instansiasi objek Buku
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->id_penerbit = $user->id_user; 
        $buku->status = 'Tersedia'; 
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan buku.');
    }

    public function edit($id_buku)
    {
        $buku = Buku::find($id_buku);
        return view('Buku.edit', compact('buku'));
    }

    public function update(Request $request, $id_buku)
    {
        // Validasi inputan
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
        ]);

        // Mengambil data buku berdasarkan ID
        $buku = Buku::find($id_buku);

        if (!$buku) {
            return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan.');
        }

        // Mengupdate judul dan penulis buku
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate.');
    }

    public function delete($id_buku)
    {
        // Mengambil data buku berdasarkan ID
        $buku = Buku::find($id_buku);

        if (!$buku) {
            return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan.');
        }

        // Menghapus buku dari database
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
