<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = ['kodeBrg', 'namaBrg', 'qty', 'satuan', 'hargaJual', 'hargaPokok'];

    public function order(){
        return $this->hasMany(order::class);
    }
}
