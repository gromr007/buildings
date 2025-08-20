<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FurnituresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dict_furnitures')->insert([
            ['name' => 'стул'],
            ['name' => 'стол'],
            ['name' => 'диван'],
            ['name' => 'шкаф'],
        ]);
    }
}



