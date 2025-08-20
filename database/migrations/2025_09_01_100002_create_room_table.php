<?php

use App\Models\House\House;
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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Название');
            $table->integer('numb_electr_points')->comment('Кол-во электро точек');
            $table->tinyInteger('suspended_ceiling')->comment('Натяжной потолок'); // Да\Нет

            //связи
            $table->integer('material_floor_id')->comment('Материал Пола'); // Ид из справочника материалов dict_material_floor
            //'house_id' - Ид из таблицы домов houses
            // Мебель - Многие ко многим таблица dict_furnitures

            //Индексы
            $table->index('name');
            $table->index('numb_electr_points');
            $table->index('suspended_ceiling');
            $table->index('material_floor_id');

            //Ограничения и каскадное удаление
            $table
                ->foreignIdFor(
                    model: House::class,
                    column: 'house_id'
                )
                ->nullable()
                ->constrained(column: 'id')
                ->onDelete(action: 'cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
