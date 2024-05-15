<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        "kode_transaksi",
        "kode_product",
        "jumlah",
        "harga",
        "total"
    ];

    // Define the relationship with products
    public function product()
    {
        return $this->belongsTo(Product::class, 'kode_product', 'kode_product');
    }
}
