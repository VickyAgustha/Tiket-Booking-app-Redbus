<?php
namespace App;  // Sesuaikan dengan folder yang digunakan (jika Laravel 8 ke atas)

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_bus',
        'id_bayar',
        'total_bayar',
        'nomor_kursi',
        'status',
        'jam_berangkat'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan Bus
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus');
    }
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_bayar');
    }
}
