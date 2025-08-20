<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LincFurnitureRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('link_dict_furniture_room')->insert([
            [
                'dict_furniture_id' => '1',
                'room_id' => '1'
            ],
            [
                'dict_furniture_id' => '2',
                'room_id' => '1'
            ],
            [
                'dict_furniture_id' => '1',
                'room_id' => '2'
            ],
            [
                'dict_furniture_id' => '3',
                'room_id' => '2'
            ],
            [
                'dict_furniture_id' => '1',
                'room_id' => '3'
            ],
            [
                'dict_furniture_id' => '1',
                'room_id' => '4'
            ],
            [
                'dict_furniture_id' => '2',
                'room_id' => '4'
            ],
            [
                'dict_furniture_id' => '3',
                'room_id' => '4'
            ],
            [
                'dict_furniture_id' => '4',
                'room_id' => '4'
            ],
        ]);
    }
}







