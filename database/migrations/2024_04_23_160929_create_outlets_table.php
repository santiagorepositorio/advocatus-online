<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            // $table->increments('id');
            $table->string('name', 60);
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->enum('city', ['Ciudad', 'La Paz', 'Oruro', 'Cochabamba', 'Potosi', 'El Alto', 'Tarija', 'Sucre', 'Santa Cruz', 'Pando', 'Beni'])->default('Ciudad');
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
            $table->foreignId('user_id')
                ->constrained();
            $table->foreignId('category_id')
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outlets');
    }
};
