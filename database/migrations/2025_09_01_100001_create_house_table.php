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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();

            $table->string('roof_color')->comment('Цвет крыши');
            $table->string('address')->comment('Адрес');
            $table->integer('number_of_floors')->comment('Этажность');
            $table->tinyInteger('built_in_garage')->comment('Встроен ли гараж'); // Да\Нет

            //связи
            $table->integer('material_wall_id')->comment('Материал стен'); // Ид из справочника материалов dict_material_wall
            // Подключенные услуги - Многие ко многим таблица dict_connected_services
            // Комнаты - связь один ко многим, хранится в rooms

            //Индексы
            $table->index('address');
            $table->index('roof_color');
            $table->index('number_of_floors');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
