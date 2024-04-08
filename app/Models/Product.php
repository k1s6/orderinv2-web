<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'table_product'; // Ganti your_table dengan nama tabel yang sesuai

    // Jika diperlukan, Anda dapat menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_product',
        'deskripsi',
        'stock_product',
        'harga_product',
        'jenis_product',
        'gambar_product'
    ];

    // Jika diperlukan, Anda juga dapat menentukan kolom-kolom yang harus disembunyikan dari array JSON
    protected $hidden = [
        // Masukkan nama kolom yang harus disembunyikan di sini
    ];
}
