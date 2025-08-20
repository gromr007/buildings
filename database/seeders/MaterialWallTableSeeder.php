<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MaterialWallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dict_material_wall')->insert([
            ['name' => 'кирпич'],
            ['name' => 'газоблок'],
            ['name' => 'дерево'],
            ['name' => 'плиты'],
            ['name' => 'другой'],
        ]);
    }
}
