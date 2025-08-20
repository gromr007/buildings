<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LincConServHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('link_dict_con_serv_house')->insert([
            [
                'dict_connected_service_id' => '1',
                'house_id' => '1'
            ],
            [
                'dict_connected_service_id' => '2',
                'house_id' => '1'
            ],
            [
                'dict_connected_service_id' => '4',
                'house_id' => '1'
            ],
            [
                'dict_connected_service_id' => '4',
                'house_id' => '2'
            ],
            [
                'dict_connected_service_id' => '5',
                'house_id' => '2'
            ],
            [
                'dict_connected_service_id' => '5',
                'house_id' => '2'
            ],
        ]);
    }
}







