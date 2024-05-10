<?php

use App\Models\Profile;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->text('about')->nullable();
            $table->string('name');           
            $table->string('slug');
            $table->string('rpa')->nullable();
            $table->string('nit')->nullable();            
            $table->string('phone');
            $table->string('email');           
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
            $table->enum('status', [Profile::BORRADOR, Profile::REVISION, Profile::PUBLICADO])->default(Profile::PUBLICADO);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
        Schema::dropIfExists('profiles');
    }
};
