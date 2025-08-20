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
        Schema::create('dict_furnitures', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Название');

            //Индексы
            $table->index('name');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dict_furnitures');
    }
};
