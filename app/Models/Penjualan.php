<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pengguna',
        'tanggal_penjualan',
        'jumlah',
        'total_harga',
        'id_pembayaran',
        'id_pengiriman',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
