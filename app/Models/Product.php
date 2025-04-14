<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'table_product'; // Ensure the table name matches your database

    protected $primaryKey = 'kode_product';
    protected $fillable = [
        'nama_product',
        'deskripsi',
        'stock_product',
        'harga_product',
        'jenis_product',
        'gambar_product',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        // Masukkan nama kolom yang harus disembunyikan di sini
    ];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'kode_product', 'kode_product');
    }
}
