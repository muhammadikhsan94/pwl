<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pembayaran;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            ['nama'=>'Cash','nomor'=>null],
            ['nama'=>'Transfer Bank BSI','nomor'=>'1234567890'],
            ['nama'=>'Transfer Bank BCA','nomor'=>'1234567890'],
            ['nama'=>'Transfer Bank BNI','nomor'=>'1234567890'],
            ['nama'=>'Transfer Bank BRI','nomor'=>'1234567890'],
        ];

        Pembayaran::insert($array);

        \Log::info('Data Pembayaran Berhasil Ditambahkan.\n');
    }
}
