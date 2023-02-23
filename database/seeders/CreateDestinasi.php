<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDestinasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) { 
            DB::table('destinasis')->insert([
                'nama' => "Gunung $i",
                'alamat' => 'Jawa Tengah',
                'deskripsi' => "$i test lorem ipsum dolor sit amet bla bla blaba lnsofsajiosfjksfdoi",
            ]);
        }
    }
}
