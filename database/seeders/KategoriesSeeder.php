<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\M_Categories;

class KategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        M_Categories::create([
            'categories_name' => 'Wisata ',
            'images' => 'images/icon/Wisata.png',
            'description' => 'Terdiri dari wisata alam, wisata sejarah, dan lainnya',
            'status' => 'Aktif'
        ]);

        // DB::table('categories')->create([
        //     'categories_name' => 'Wista ',
        //     'images' => 'images/icon/Wisata.png',
        //     'description' => 'Terdiri dari wisata alam, wisata sejarah, dan lainnya',
        //     'status' => 'Aktif',
        // ]);
        // DB::table('categories')->create([
        //     'categories_name' => 'Kuliner',
        //     'images' => 'images/icon/Kuliner.png',
        //     'description' => 'Menyajikan referensi kuliner, mulai dari street food, cafe, rumah makan, da resto',
        //     'status' => 'Aktif',
        // ]);
        // DB::table('categories')->create([
        //     'categories_name' => 'Hotel',
        //     'images' => 'images/icon/Hotel.png',
        //     'description' => 'Rekomendasi penginapan hotel, vila, dan home stay',
        //     'status' => 'Aktif',
        // ]);
        // DB::table('categories')->create([
        //     'categories_name' => 'Desa Wisata',
        //     'images' => 'images/icon/DesaWisata.png',
        //     'description' => 'Referensi ekonomi kreatif asli Subang untuk oleh-oleh liburanmu',
        //     'status' => 'Aktif',
        // ]);
        // DB::table('categories')->create([
        //     'categories_name' => 'Ekonomi Kreatif',
        //     'images' => 'images/icon/Ekraf.png',
        //     'description' => 'Mengenal dan belajar kebudayaan yang ada di Subang',
        //     'status' => 'Aktif',
        // ]);

    }
}
