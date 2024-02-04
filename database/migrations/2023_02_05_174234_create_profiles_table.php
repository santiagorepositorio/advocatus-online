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
            $table->string('city');
            $table->string('state');
            $table->text('about');
            $table->string('name');
            $table->string('email');           
            $table->string('date');
            $table->string('rpa');
            $table->string('nit');

            $table->string('phone');
            $table->text('iframe');
            $table->enum('status', [Profile::BORRADOR, Profile::REVISION, Profile::PUBLICADO])->default(Profile::BORRADOR);
            $table->string('slug');
            

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
