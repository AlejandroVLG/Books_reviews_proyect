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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('nick_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->integer('age');
            $table->string('country');
            $table->string('favourite_author');
            $table->string('favourite_genre');
            $table->string('currently_reading');
            $table->string('facebook_account')->unique();
            $table->string('twitter_account')->unique();
            $table->string('instagram_account')->unique();
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
        Schema::dropIfExists('users');
    }
};
