<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Selesai extends Model
{
    protected $table = 'selesai';
    protected $primaryKey = 'id_selesai';
    protected $fillable = ['id_user','jam_sampai'];
public $timestamps = false;


    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
