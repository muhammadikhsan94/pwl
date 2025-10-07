<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePengguna extends Model
{
    use HasFactory;

    protected $table = 'role_pengguna';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pengguna',
        'id_role',
        'last_sync'
    ];

    public function peran()
    {
        return $this->belongsTo('\App\Models\Role','id_role','id');
    }
}
