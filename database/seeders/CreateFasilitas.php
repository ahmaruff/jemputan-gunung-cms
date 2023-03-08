<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateFasilitas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) { 
            DB::table('fasilitas')->insert([
                'nama' => "Fasilitas $i",
                'keterangan' => "$i test lorem ipsum dolor sit amet bla bla blaba lnsofsajiosfjksfdoi",
            ]);
        }
    }
}
