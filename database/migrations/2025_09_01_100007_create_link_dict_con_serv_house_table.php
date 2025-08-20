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
        Schema::create('link_dict_con_serv_house', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dict_connected_service_id')->nullable()->index()->constrained('dict_connected_services')->onDelete('cascade');
            $table->foreignId('house_id')->nullable()->index()->constrained('houses')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_dict_con_serv_house');
    }
};
