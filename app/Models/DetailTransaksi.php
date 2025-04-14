<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi'; // Ensure the table name matches your database

    public $timestamps = false;

    protected $fillable = [
        "kode_transaksi",
        "nama_product",
        "jumlah",
        "harga",
        "total",
        "kode_product",
        "catatan"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'kode_product', 'kode_product');
    }
}
