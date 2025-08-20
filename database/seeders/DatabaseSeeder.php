<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(HousesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(FurnituresTableSeeder::class);
        $this->call(ConnectedServicesTableSeeder::class);
        $this->call(MaterialFloorTableSeeder::class);
        $this->call(MaterialWallTableSeeder::class);
        $this->call(LincConServHousesTableSeeder::class);
        $this->call(LincFurnitureRoomTableSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
