<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Спальня',
                'numb_electr_points' => '35',
                'suspended_ceiling' => '1',
                'material_floor_id' => '1',
                'house_id' => '1',
            ],
            [
                'name' => 'Детская',
                'numb_electr_points' => '15',
                'suspended_ceiling' => '1',
                'material_floor_id' => '3',
                'house_id' => '1',
            ],
            [
                'name' => 'Зал',
                'numb_electr_points' => '20',
                'suspended_ceiling' => '0',
                'material_floor_id' => '2',
                'house_id' => '1',
            ],
            [
                'name' => 'Студия',
                'numb_electr_points' => '35',
                'suspended_ceiling' => '1',
                'material_floor_id' => '4',
                'house_id' => '2',
            ],

        ]);
    }
}
