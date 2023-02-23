<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'admin@jemputangunung.com',
            'username' => 'admin',
            'nama' => 'Admin JG',
            'password' => Hash::make('@admin123'),
        ];

        DB::table('admins')->insert($data);
    }
}
