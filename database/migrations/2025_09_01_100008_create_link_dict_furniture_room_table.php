<?php

use Illuminate\Support\Facades\{DB, Schema};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('link_dict_furniture_room', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dict_furniture_id')->nullable()->index()->constrained('dict_furnitures')->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->index()->constrained('rooms')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_dict_furniture_room');
    }
};
