<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MaterialFloorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dict_material_floor')->insert([
            ['name' => 'ламинат'],
            ['name' => 'плитка'],
            ['name' => 'линолеум'],
            ['name' => 'паркет'],
            ['name' => 'другой'],
        ]);
    }
}




