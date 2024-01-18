<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus'; //tambahkan ini
    protected $primaryKey = 'id_buku'; //tambahkan ini
    protected $fillable = [ //tambahkan ini
        'judul',
        'penulis',
        'id_penerbit',
        'status',
    ];
}
