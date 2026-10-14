<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';  // Sesuai dengan nama tabel
    protected $primaryKey = 'id_bus';
    public $timestamps = false;

    protected $fillable = [
        'nama_bus', 
        'kapasitas', 
        'harga_tiket', 
        'jadwal_berangkat',
        'jam_berangkat', 
        'asal', 
        'tujuan'
    ];

    public function kursis()
    {
        return $this->hasMany(Kursi::class, 'id_bus', 'id_bus');
    }
}
