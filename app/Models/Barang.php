<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'harga', 
        'stok', 
        'image',
        'keterangan'
    ];
    public function pesanan_detail()
    {
        return $this->hasMany('App\PesananDetail','barang_id','id');
    }

}
