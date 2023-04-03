<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //ADMIN USER
        $dataAdmin = [
            'email' => 'admin@jemputangunung.com',
            'username' => 'admin',
            'nama' => 'Admin JG',
            'password' => Hash::make('@admin123'),
        ];

        DB::table('admins')->insert($dataAdmin);


        // CATEGORY
        $dataCategory = [
            [
                'category' => 'Tips & trik',
                'slug'  => Str::slug('Tips & trik'),
            ],
            [
                'category' => 'Info Wisata',
                'slug'  => Str::slug('Info Wisata'),
            ],
            [
                'category' => 'Uncategorized',
                'slug'  => Str::slug('Uncategorized'),
            ],
        ];

        foreach($dataCategory as $cat) {
            DB::table('blog_categories')->insert($cat);
        }

        // FASILITAS
        $dataFasilitas = [
            [
                'nama' => 'Penginapan',
                'Keterangan' => 'Penginapan selama tour'
            ],
            [
                'nama' => 'Logistik',
                'Keterangan' => 'Logistik pendakian',
            ],
            [
                'nama' => 'Transportasi',
                'Keterangan' => 'Transportasi Pulang-Pergi',
            ],
            [
                'nama' => 'Dokumentasi/Kamera',
                'Keterangan' => 'Kamera DSLR & Fotografer',
            ],
        ];

        foreach($dataFasilitas as $fas) {
            DB::table('fasilitas')->insert($fas);
        }

        $dataDestinasi = [
            [
                'nama' => 'Gunung Prau',
                'alamat' => 'Wonosobo, Jawa Tengah',
                'deskripsi' => 'Pendakian Gunung Prau via Pathak Banteng',
            ],
            [
                'nama' => 'Gunung Sindoro',
                'alamat' => 'Temanggung, Jawa Tengah',
                'deskripsi' => 'Pendakian Gunung Sindoro via Kledung',
            ],
            [
                'nama' => 'Gunung Sumbing',
                'alamat' => 'Magelang, Jawa Tengah',
                'deskripsi' => 'Pendakian Gunung Sumbing via Kaliangkrik',
            ],
            [
                'nama' => 'Pantai Parang Tritis',
                'alamat' => 'Gunung Kidul, DIY',
                'deskripsi' => 'Pantai',
            ],
        ];

        foreach($dataDestinasi as $des) {
            DB::table('destinasis')->insert($des);
        }
    }
}
