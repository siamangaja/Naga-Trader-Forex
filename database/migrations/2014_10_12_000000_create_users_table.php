<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email', 50)->unique();
            $table->string('address', 100)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('bitcoin', 100)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('verified_at')->nullable();
            $table->integer('status')->default(1); //0 = pending; 1 = active
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