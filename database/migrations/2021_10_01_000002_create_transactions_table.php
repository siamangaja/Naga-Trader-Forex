<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trx_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('type', 12);
            $table->string('symbol', 12);
            $table->double('price');
            $table->double('amount');
            $table->double('fee');
            $table->double('total');
            
            $table->string('notes')->nullable();
            $table->integer('status')->default(0); //0 = pending; 1 = success; 2 = failed
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
        Schema::dropIfExists('transactions');
    }
}