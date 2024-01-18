<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBuku extends Model
{
    use HasFactory;

    protected $table = 'pinjam_bukus'; //tambahkan ini
    protected $primaryKey = 'id_pinjam_buku'; //tambahkan ini
    protected $fillable = [ //tambahkan ini
        'id_buku',
        'id_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];
}
