<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'pengguna'; // Sesuaikan tabel
    protected $primaryKey = 'id_user'; // Sesuaikan primary key
    public $timestamps = false; // Jika tidak ada created_at & updated_at

    protected $fillable = [
        'nama',
        'no_telpon',
        'password',
        'diskon_pertama',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_user', 'id_user');
    }
}
