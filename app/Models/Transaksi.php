<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $table = 'transaksi';

    protected $primaryKey = "kode_transaksi";

    protected $fillable = [
        "nama",
        "status",
        "jumlah",
        "total",
        "catatan",
        "update"
    ];

    // Define the relationship with details
    public function details()
    {
        return $this->hasMany(DetailTransaksi::class, 'kode_transaksi', 'kode_transaksi');
    }
}
