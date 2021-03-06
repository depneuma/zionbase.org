<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('office');
            $table->string('name');
            $table->text('about');
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table
                ->string('avatar')
                ->default('public/default.jpg')
                ->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('12345678');
            $table->string('remember_token', 100)->nullable();

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
}
