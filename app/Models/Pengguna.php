<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Pengguna extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string',
        'email_verified_at' => 'datetime',
    ];
    protected $fillable = [
        'id',
        'nama',
        'username',
        'email',
        'password',
        'aktif',
        'soft_delete',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->hasMany('\App\Models\RolePengguna','id','id_pengguna');
    }

    public static function getUser($id)
    {
        $q = "
            SELECT
                p.*,
                rp.id_role,
                r.nama AS role
            FROM
                pengguna AS p
                JOIN role_pengguna AS rp ON rp.id_pengguna=p.id
                JOIN role AS r ON r.id=rp.id_role
            WHERE
                p.id=?
            ORDER BY
                rp.last_sync DESC
        ";
        $data = DB::SELECT($q, [$id]);

        return $data[0] ?? null;
    }

    public static function listUser()
    {
        $q = "
            SELECT
                p.*,
                rp.id_role,
                r.nama AS role,
                rp.last_sync
            FROM
                pengguna AS p
                JOIN role_pengguna AS rp ON rp.id_pengguna=p.id
                JOIN role AS r ON r.id=rp.id_role
            WHERE
                p.soft_delete = '0'
            ORDER BY
                rp.last_sync DESC
        ";
        $data = DB::SELECT($q);

        return $data;
    }
}
