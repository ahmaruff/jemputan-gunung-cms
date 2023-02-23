<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDestinasiPaket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) { 
            DB::table('destinasi_paket')->insert([
                'destinasi_id' => rand(1,4),
                'paket_id' => rand(1,4),
            ]);
        }
    }
}
