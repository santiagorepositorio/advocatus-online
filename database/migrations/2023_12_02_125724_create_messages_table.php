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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('wa_id');
            $table->string('wam_id');
            $table->string('type', 15);
            $table->boolean('outgoing');
            $table->longText('body');
            $table->string('status', 15);
            $table->longText('caption')->nullable();
            $table->binary('data');
            $table->string('user_phone')->nullable();
            $table->timestamps();

            $table->foreign('user_phone')->references('phone')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
