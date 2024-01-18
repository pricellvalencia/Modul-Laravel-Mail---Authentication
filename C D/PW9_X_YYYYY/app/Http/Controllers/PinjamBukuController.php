<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\PinjamBuku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PinjamBukuController extends Controller
{
    //menampilkan buku yang dapat dipinjam
    public function index()
    {
        // Mengambil pengguna yang sedang login
        $user = Auth::user();
        
        // Mengambil data buku berdasarkan id_user yang sedang login
        $pinjam = DB::table('bukus')
            ->select('bukus.*', 'users.username as penerbit')
            ->join('users', 'bukus.id_penerbit', '=', 'users.id_user')
            ->where('bukus.id_penerbit', '!=', $user->id_user)
            ->where('bukus.status', '=', 'Tersedia')
            ->paginate(5);

        return view('PinjamBuku.index', compact('pinjam'));
    }

    //menambahkan data pinjam baru
    public function create($id_buku)
    {
        //mengambil pengguna yang sedang login
        $user = Auth::user();

        //membuat data pinjam buku
        $pinjam = new PinjamBuku;
        $pinjam->id_buku = $id_buku;
        $pinjam->id_peminjam = $user->id_user;
        $pinjam->tanggal_pinjam = date('Y-m-d');
        $pinjam->save();

        // Update status buku menjadi 'Dipinjam'
        $buku = Buku::find($id_buku);
        $buku->status = 'Dipinjam';
        $buku->save();

        return redirect()->route('pinjam.index')->with('success', 'Buku berhasil dipinjam.');
    }

    //menampilkan data buku yang sedang dipinjam user
    public function show()
    {
        //mengambil user yang sedang login
        $user = Auth::user();

        //mengambil data pinjam buku berdasarkan id_peminjam
        $kembali = DB::table('pinjam_bukus')
            ->select('pinjam_bukus.*', 'users.username as penerbit', 'bukus.judul as judul', 'bukus.penulis as penulis', 'bukus.status as status')
            ->join('bukus', 'pinjam_bukus.id_buku', '=', 'bukus.id_buku')
            ->join('users', 'bukus.id_penerbit', '=', 'users.id_user')
            ->where('pinjam_bukus.id_peminjam', '=', $user->id_user)
            ->where('pinjam_bukus.tanggal_kembali', '=', null)
            ->paginate(5);

        return view('PinjamBuku.return', compact('kembali'));
    }

    //mengembalikan buku yang dipinjam user
    public function edit($id_pinjam_buku)
    {
        //update tanggal kembali di tabel pinjam buku
        $kembali = PinjamBuku::find($id_pinjam_buku);
        $kembali->tanggal_kembali = date('Y-m-d');
        $kembali->save();
        
        //update status di tabel buku
        $buku = Buku::find($kembali->id_buku);
        $buku->status = 'Tersedia';
        $buku->save();

        return redirect()->route('kembali')->with('success', 'Buku berhasil dikembalikan.');
    }

    //menampilkan data buku yang pernah dipinjam user
    public function history()
    {
        //mengambil data user yang sedang login
        $user = Auth::user();

        //mengambil data buku yang pernah dipinjam user
        $history = DB::table('pinjam_bukus')
            ->select('pinjam_bukus.*', 'users.username as penerbit', 'bukus.judul as judul', 'bukus.penulis as penulis')
            ->join('bukus', 'pinjam_bukus.id_buku', '=', 'bukus.id_buku')
            ->join('users', 'bukus.id_penerbit', '=', 'users.id_user')
            ->where('pinjam_bukus.id_peminjam', '=', $user->id_user)
            ->orderBy('created_at','desc')
            ->paginate(5);

        return view('PinjamBuku.history', compact('history'));
    }
}
