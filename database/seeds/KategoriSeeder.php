<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'fiksi'
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'non-fiksi'
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'pendidikan'
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'sastra'
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'sejarah'
        ]);
    }
}
