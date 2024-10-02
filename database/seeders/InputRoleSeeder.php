<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class InputRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //SET ADMIN
        Role::insert([
            'name' => 'Administrator'
        ]);

        //SET STUDENT
        Role::create([
            'name' => 'Student'
        ]);
    }
}
