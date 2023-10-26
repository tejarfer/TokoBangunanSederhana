<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['tglOrder', 'namaPembeli', 'noTelepon', 'alamat', 'barangId', 'jumlahOrder', 'keterangan'];

    public function barang(){
        return $this->belongsTo(barang::class, 'barangId');
    }

    public function user(){
        return $this->hasMany(User::class);
    }

}
