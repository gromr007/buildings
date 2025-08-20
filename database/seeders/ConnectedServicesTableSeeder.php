<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ConnectedServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dict_connected_services')->insert([
            ['name' => 'газ'],
            ['name' => 'вода'],
            ['name' => 'канализация'],
            ['name' => 'электричество'],
            ['name' => 'интернет'],
        ]);
    }
}







