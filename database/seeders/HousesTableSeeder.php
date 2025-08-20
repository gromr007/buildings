<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('houses')->insert([
            [
                'roof_color' => 'Зеленая',
                'address' => 'Семенова',
                'number_of_floors' => '3',
                'built_in_garage' => '1',
                'material_wall_id' => '2',
            ],
            [
                'roof_color' => 'Красная',
                'address' => 'Буденова',
                'number_of_floors' => '1',
                'built_in_garage' => '0',
                'material_wall_id' => '4',
            ],
        ]);
    }
}
