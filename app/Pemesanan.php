<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{

    //use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_order'; // Tambahkan ini
    public $timestamps = false;
    
    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_user',
        'id_bus',
        'tgl_order',
        'diskon',
        'total_bayar',
        'bukti_bayar',
    ];

}
