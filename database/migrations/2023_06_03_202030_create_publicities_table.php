<?php

use App\Models\Publicity;
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
        Schema::create('publicities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('link');
            $table->enum('status', [Publicity::BORRADOR, Publicity::ACTIVO, Publicity::INACTIVO])->default(Publicity::ACTIVO);
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
        Schema::dropIfExists('publicities');
    }
};
