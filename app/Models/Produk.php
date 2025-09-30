<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'deksripsi',
        'harga',
        'stok',
        'aktif',
        'soft_delete',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

}
