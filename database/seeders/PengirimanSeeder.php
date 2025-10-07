<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengiriman;

class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            ['nama'=>'Diambil Langsung'],
            ['nama'=>'Gojek'],
            ['nama'=>'Grab'],
            ['nama'=>'JNE'],
            ['nama'=>'JNT'],
        ];

        Pengiriman::insert($array);

        \Log::info('Data Pengiriman Berhasil Ditambahkan.\n');
    }
}
