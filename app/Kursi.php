<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    protected $table = 'kursi'; // Sesuai dengan nama tabel
    protected $primaryKey = 'id_kursi'; // Primary Key
    public $timestamps = false; // Jika tidak ada created_at dan updated_at

    protected $fillable = ['id_bus', 'nomor'];

    // Relasi ke tabel bus
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id_bus');
    }
}
