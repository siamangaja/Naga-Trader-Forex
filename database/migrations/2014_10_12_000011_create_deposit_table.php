<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('deposit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref')->nullable();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('bank_name', 50);
            $table->string('bank_number', 50);
            $table->string('bank_account', 50);
            $table->double('amount');
            $table->double('fee');
            $table->double('total');
            $table->integer('status')->default(0); //0 = pending; 1 = success;
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposit');
    }
}