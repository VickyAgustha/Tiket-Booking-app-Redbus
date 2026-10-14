<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //use HasFactory;

    protected $table = 'pembayaran'; // nama tabel di database
    protected $primaryKey = 'id_bayar'; // jika primary key bukan "id"
    public $timestamps = false; // karena kita tidak pakai created_at & updated_at

    protected $fillable = [
        'id_order',
        'metode_bayar',
        'tgl_bayar',
        'status_bayar',
        'bukti_bayar',
        'total_bayar',
        'nomor_kursi',
        'id_bus'
    ];
    public function pemesanan()
{
    return $this->belongsTo(Pemesanan::class, 'id_order', 'id_order');
}
public function bus()
{
    return $this->belongsTo(Bus::class, 'id_bus');
}
public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tiket()
    {
        return $this->hasOne(Tiket::class, 'id_bayar');
    }

    public function selesai()
    {
        return $this->hasOne(Selesai::class, 'id_bayar');
    }
}
