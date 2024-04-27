<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'transaksi'; // Ganti your_table dengan nama tabel yang sesuai

    // Jika diperlukan, Anda dapat menentukan kolom-kolom yang dapat diisi secara massal
    protected $primaryKey = 'kode_transaksi';
    protected $fillable = [
        'nama',
        'status',
        'jumlah',
        'total',
        'update'
    ];

    // Jika diperlukan, Anda juga dapat menentukan kolom-kolom yang harus disembunyikan dari array JSON
    protected $hidden = [
        // Masukkan nama kolom yang harus disembunyikan di sini
    ];
}
