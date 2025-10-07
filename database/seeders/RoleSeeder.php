<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            ['nama'=>'Admin','aktif'=>1],
            ['nama'=>'Customer','aktif'=>1],
        ];

        Role::insert($array);

        \Log::info('Data Role Berhasil Ditambahkan.\n');
    }
}
