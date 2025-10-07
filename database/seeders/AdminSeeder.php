<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = Str::uuid();

        $pengguna = \App\Models\Pengguna::insert([
            'id' => $uuid,
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => \Hash::make('password'),
            'email' => 'admin@gmail.com',
            'created_by' => $uuid,
        ]);

        $role_pengguna = \App\Models\RolePengguna::insert([
            'id_pengguna' => $uuid,
            'id_role' => 1,
            'last_sync' => now()
        ]);

        \Log::info('Data Admin Berhasil Ditambahkan.\n');
    }
}
