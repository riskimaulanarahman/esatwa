<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'Nebula',
            'publisher' => "Tere Liye",
            'gambar' => "9786020639536_nebula_cov.jpg",
            'price' => 68000,
            'idKategori' => 1,
            'stok' => 40,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Dunia Sophie',
            'publisher' => "Gramedia",
            'gambar' => "9786024410209_dunia-sophie-republish.jpg",
            'price' => 114000,
            'idKategori' => 1,
            'stok' => 45,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'China Rich Girlfriend',
            'publisher' => "Gramedia",
            'gambar' => "9786020337593_kekasih-kaya-raya-_china-rich-girlfriend_.jpg",
            'price' => 98000,
            'idKategori' => 1,
            'stok' => 43,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Kamus Inggris - Indonesia Edisi yang Diperbarui',
            'publisher' => "Gramedia",
            'gambar' => "9786020305646_Kamus-Inggris.jpg",
            'price' => 178000,
            'idKategori' => 3,
            'stok' => 43,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Pangeran Diponegoro : Melacak Gerakan Perlawanan & Laku Spiritualitas',
            'publisher' => "Gramedia",
            'gambar' => "img659_j1MM4wB.jpg",
            'price' => 68000,
            'idKategori' => 5,
            'stok' => 103,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Tulisan Pilihan Dari Pengasingan',
            'publisher' => "Buku Obor",
            'gambar' => "9786024339746.jpg",
            'price' => 120000,
            'idKategori' => 5,
            'stok' => 43,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Homemade Snacks & Desserts Ala Xander Kitchen',
            'publisher' => "Gramedia",
            'gambar' => "9786020398501_HOMEMADE_SNACK_DESSAERTS_Xander_s_Kitchen.jpg",
            'price' => 156000,
            'idKategori' => 2,
            'stok' => 23,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Mengapa Luka Tidak Memaafkan Pisau',
            'publisher' => "Gramedia",
            'gambar' => "Mengapa_Luka_Tidak_Memaafkan_Pisau.jpeg",
            'price' => 99000,
            'idKategori' => 4,
            'stok' => 23,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'publisher' => "Gramedia Widiasarana Indonesia",
            'gambar' => "9786024526986_Sebuah-Seni-Untuk-Bersikap-Bodo-Amat.jpg",
            'price' => 53000,
            'idKategori' => 9,
            'stok' => 23,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Stephen Hawking: A Mind Without Limits',
            'publisher' => "Mizan Media Utama",
            'gambar' => "9786024411015_Stephen-Hawking-A-Mind-Without-Limits.jpg",
            'price' => 199000,
            'idKategori' => 9,
            'stok' => 50,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Milea Suara Dari Dilan',
            'publisher' => "Mizan Publishing",
            'gambar' => "9786020851563_milea_suara_dari_dilan_1.jpg",
            'price' => 89000,
            'idKategori' => 1,
            'stok' => 30,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Bintang',
            'publisher' => "Gramedia Pustaka Utama",
            'gambar' => "9786020351179_Bintang_KMkHa9G.jpg",
            'price' => 79000,
            'idKategori' => 1,
            'stok' => 53,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('books')->insert([
            'title' => 'Crazy Rich Asians',
            'publisher' => "Gramedia",
            'gambar' => "crazy.jpg",
            'price' => 105000,
            'idKategori' => 1,
            'stok' => 43,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
